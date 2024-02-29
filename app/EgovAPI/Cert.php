<?php

namespace App\EgovAPI;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecurityKey;

class Cert
{

    const XMLDSIGNS = 'http://www.w3.org/2000/09/xmldsig#';
    const SHA1 = 'http://www.w3.org/2000/09/xmldsig#sha1';
    const SHA256 = 'http://www.w3.org/2001/04/xmlenc#sha256';
    const SHA384 = 'http://www.w3.org/2001/04/xmldsig-more#sha384';
    const SHA512 = 'http://www.w3.org/2001/04/xmlenc#sha512';
    const RIPEMD160 = 'http://www.w3.org/2001/04/xmlenc#ripemd160';
    const C14N = 'http://www.w3.org/TR/2001/REC-xml-c14n-20010315';
    const C14N_COMMENTS = 'http://www.w3.org/TR/2001/REC-xml-c14n-20010315#WithComments';
    const EXC_C14N = 'http://www.w3.org/2001/10/xml-exc-c14n#';
    const EXC_C14N_COMMENTS = 'http://www.w3.org/2001/10/xml-exc-c14n#WithComments';
    private $xml = null;
    private $x509 = [];
    private $pkey = '';
    private $signature = '';
    private $references = [];
    public function __construct($xml)
    {
        $this->xml = $xml;
    }
    /**
     * PFXファイルの読込
     * PFXまたはPL2ファイルを読み込み、証明書データを保持する
     * @param string $path
     * @param string $password
     * @return bool
     */
    public function loadPfx($path, $password = ''): bool
    {
        $p12 = file_get_contents($path);
        if (openssl_pkcs12_read($p12, $certs, $password)) {
            $this->pkey = $certs['pkey'];
            $this->x509 = [];
            array_push($this->x509, $certs['cert']);

            if (!empty($certs['extracerts'])) {
                foreach ($certs['extracerts'] as $extra) {
                    array_push($this->x509, $extra);
                }
            }

            return true;
        }
        return false;
    }
    /**
     * Reference URIの作成
     * DigestValueを生成するために必要なReferenceURIの値を設定する
     * @param string $value
     * @param string $isXml
     * @return void
     */
    public function addReference($url, $data)
    {
        array_push($this->references, ['url' => $url, 'data' => $data]);
    }

    /**
     * 電子証明を付与する
     * 指定したXMLファイルを署名する
     * @return string | null
     */
    public function sign()
    {
        if (empty($this->x509) || empty($this->pkey))
            return null;

        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;
        $dom->loadXML($this->xml);

        $target_tag = $dom->getElementsByTagName('構成情報')->item(0);

        $sig_info = $dom->createElement('署名情報');
        $sig = $dom->createElement('Signature');

        $today = date("YmdHis");

        $sig->setAttribute('Id', $today);
        $sig->setAttribute('xmlns', self::XMLDSIGNS);

        $signed_info = $dom->createElement('SignedInfo');
        $signed_info->setAttribute('xmlns', self::XMLDSIGNS);
        $sig->appendChild($signed_info);
        $sig_info->appendChild($sig);

        $target_tag->parentNode->insertBefore($sig_info, $target_tag->nextSibling);

        $this->generateMethods($dom, $signed_info);
        $this->generateConfigInfo($dom, $signed_info);
        $this->generateReference($dom, $signed_info);
        $this->generateSignatureValue($dom, $sig);
        $this->generateX509Cert($dom, $sig);

        $new_xml = $dom->saveXML();

        return $this->cleanUpXML($new_xml);
    }

    private function generateMethods(&$dom, &$signed_info)
    {
        $cm = $dom->createElement('CanonicalizationMethod');
        $cm->setAttribute('Algorithm', self::C14N);
        $signed_info->appendChild($cm);

        $sm = $dom->createElement('SignatureMethod');
        $sm->setAttribute('Algorithm', 'http://www.w3.org/2001/04/xmldsig-more#rsa-sha256');
        $signed_info->appendChild($sm);
    }

    private function generateConfigInfo(&$dom, &$signed_info)
    {
        $kousei_info = $dom->getElementsByTagName('構成情報')->item(0);
        $kousei = $dom->saveXML($kousei_info);

        $kousei_dom = new \DOMDocument('1.0', 'UTF-8');
        $kousei_dom->loadXML($kousei);

        $c14nString = $kousei_dom->C14N();
        $c14nHash = hash('SHA256', $c14nString, true);

        $ref = $dom->createElement('Reference');
        $ref->setAttribute('URI', '#' . urlencode('構成情報'));

        $trs = $dom->createElement('Transforms');
        $ref->appendChild($trs);
        $tr = $dom->createElement('Transform');
        $tr->setAttribute('Algorithm', self::C14N);
        $trs->appendChild($tr);

        $dm = $dom->createElement('DigestMethod');
        $dm->setAttribute('Algorithm', self::SHA256);
        $ref->appendChild($dm);
        $dv = $dom->createElement('DigestValue');
        $ref->appendChild($dv);
        $digest_value = $dom->createTextNode(base64_encode($c14nHash));
        $dv->appendChild($digest_value);

        $signed_info->appendChild($ref);
    }

    private function generateReference(&$dom, &$signed_info)
    {
        foreach ($this->references as $r) {

            $ref = $dom->createElement('Reference');
            $ref->setAttribute('URI', urlencode($r['url']));

            $dm = $dom->createElement('DigestMethod');
            $dm->setAttribute('Algorithm', self::SHA256);
            $ref->appendChild($dm);
            $dv = $dom->createElement('DigestValue');
            $ref->appendChild($dv);
            $digest_value = $dom->createTextNode(base64_encode(hash('SHA256', $r['data'], true)));
            $dv->appendChild($digest_value);

            $signed_info->appendChild($ref);
        }
    }
    private function generateSignatureValue(&$dom, &$sig)
    {
        $signature = '';
        $sv = $dom->createElement('SignatureValue');
        $sig->appendChild($sv);

        $signed_info = $dom->getElementsByTagName('SignedInfo')->item(0);

        $canonicalSignedInfo = $signed_info->C14N(true, false);

        $messageDigest = hash('sha256', $canonicalSignedInfo, true);
        openssl_sign($messageDigest, $signature, $this->pkey, OPENSSL_ALGO_SHA256);
        $signatureValueBase64 = base64_encode($signature);

        $signature_value = $dom->createTextNode($signatureValueBase64);
        $sv->appendChild($signature_value);
    }

    private function generateX509Cert(&$dom, &$sig)
    {
        $ki = $dom->createElement('KeyInfo');
        $sig->appendChild($ki);
        $cer = $dom->createElement('X509Data');
        $ki->appendChild($cer);

        foreach ($this->x509 as $c) {
            $x = $dom->createElement('X509Certificate');
            $x_val = $dom->createTextNode($this->encodeX509($c));
            $x->appendChild($x_val);
            $cer->appendChild($x);
        }
    }

    private function encodeX509($x509_cert)
    {
        $certData = openssl_x509_read($x509_cert);

        if (empty($certData))
            return '';
        $certDataPem = '';
        openssl_x509_export($certData, $certDataPem);
        $certDataPemClean = str_replace("-----BEGIN CERTIFICATE-----", "", $certDataPem);
        $certDataPemClean = str_replace("-----END CERTIFICATE-----", "", $certDataPemClean);
        $certDataPemClean = str_replace("\n", "", $certDataPemClean);
        $certDataPemClean = str_replace("\r", "", $certDataPemClean);
        return $certDataPemClean;
    }

    private function cleanUpXML($string)
    {
        $string = preg_replace("/>\s*</", ">\n<", $string);
        $lines = explode("\n", $string);
        $string = '';
        $indent = 0;

        foreach ($lines as $line) {
            $increment = false;
            $decrement = false;

            if (preg_match('#<\?xml.+\?>#', $line) == true) {
                // <?xml …
            } elseif (preg_match('#<[^/].+>.*</.+>#', $line) == true) {
                // Open Tag & Close Tag
            } elseif (preg_match('#<.+/>#', $line) == true) {
                // Self-closing Tag
            } elseif (preg_match('#<!.*>#', $line) == true) {
                // Comments and CDATA
            } elseif (preg_match('#<[^/].+>#', $line) == true) {
                // Open Tag
                $increment = true;
            } elseif (preg_match('#</.+>#', $line) == true) {
                // Close Tag
                $decrement = true;
            } else {
                // Others
            }

            if ($decrement === true) {
                $indent -= 1;
            }

            $string .= str_repeat("  ", $indent) . $line . "\n";

            if ($increment === true) {
                $indent += 1;
            }
        }

        return $string;
    }
}

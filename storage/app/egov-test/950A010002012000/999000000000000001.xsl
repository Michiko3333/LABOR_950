<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:output method="html" encoding="UTF-8"/>


<xsl:template match="/">
	<html>
		<head>
			<title>
				<xsl:text>基本情報 </xsl:text>
			</title>
		</head>
		<body>
			<table>
				<tr>
					<td>
						<xsl:apply-templates select="DataRoot/構成情報"/>
						<xsl:apply-templates select="DataRoot/構成情報/管理情報"/>
						<xsl:apply-templates/>
					</td>
				</tr>
			</table>
		</body>
	</html>
</xsl:template>




<xsl:template match="DataRoot/構成情報">
       
<form method="post" action="JSPservlet">
<table width="800">
	<tr>
		<td>
			<font face="Meiryo" color="#000000" size="6">
				<xsl:text>基本情報 </xsl:text>
			</font>
		</td>
	</tr>
	<tr>
		<td>
			<font face="Meiryo" color="#000000" size="3">
				<xsl:text>◆は必須入力項目です</xsl:text>
			</font>
		</td>
	</tr> 
</table>
</form>
</xsl:template>



<xsl:template match="DataRoot/構成情報/管理情報">
<form method="post" action="JSPservlet">

<xsl:for-each select="申請者連絡先情報">

<table width="800">
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

	<tr>
		<td>
			<td>
				<font face="Meiryo" color="#000000" size="3">
					<xsl:text></xsl:text>
				</font>
			</td>
		</td>
	</tr> 
</table>


<table  width="800">
	<tr>
		<td>
			<font face="Meiryo" color="#000000" >
				<xsl:text>▼申請者・届出者に関する情報</xsl:text>
			</font>
		</td>
	</tr> <tr></tr><tr></tr>
</table>

<table width="800">
	<tr>
		<td>
			<font face="Meiryo" color="#000000" >
				<xsl:text>　法人・団体の名称</xsl:text>
			</font>
		</td>
	</tr><tr></tr><tr></tr>
</table>

<table width="800">
	<tr>
		<td width="50"></td>
		<td width="100">
			<font face="Meiryo" color="#000000">
				<xsl:text>漢字</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="申請者情報/法人団体名" />
		</font>
		</td>
	</tr>
	<tr>
		<td width="50"></td>
		<td width="100">
			<font face="Meiryo" color="#000000">
				<xsl:text>フリガナ</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="申請者情報/法人団体名フリガナ" />
		</font>
		</td>
		
</tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
</table>

<table width="800">
	<tr>
		<td>
			<font face="Meiryo" color="#000000" >
				<xsl:text>　氏名（法人・団体の場合は代表者氏名）</xsl:text>
			</font>
		</td>
	</tr> <tr></tr><tr></tr>
</table>

<table width="800">
	<tr>
		<td width="50"></td>
		<td width="100">
			<font face="Meiryo" color="#000000">
				<xsl:text>◆漢字</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="申請者情報/氏名" />
		</font>
		</td>
	</tr>
	<tr>
		<td width="50"></td>
		<td width="100">
			<font face="Meiryo" color="#000000">
				<xsl:text>◆フリガナ</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="申請者情報/氏名フリガナ" />
		</font>

		</td>
	</tr>

<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

</table>

<table width="800">
	<tr>
		<td>
			<font face="Meiryo" color="#000000">
				<xsl:text>　部門の名称</xsl:text>
			</font>
		</td>
	</tr><tr></tr><tr></tr>
</table>

<table width="800">
	<tr>
		<td width="50"></td>
		<td width="100">
		<font face="Meiryo" color="#000000">
			<xsl:text>漢字</xsl:text>
		</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="申請者情報/部門名" />
		</font>
		</td>
	</tr>
	<tr>
		<td width="50"></td>
		<td width="100">
		<font face="Meiryo" color="#000000">
			<xsl:text>フリガナ</xsl:text>
		</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="申請者情報/部門名フリガナ" />
		</font>
		</td>
	</tr>

<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

</table>


<table width="800">
	<tr>
		<td width="50"></td>
		<td width="100">
		<font face="Meiryo" color="#000000">
			<xsl:text>役職</xsl:text>
		</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="申請者情報/役職" />
		</font>
		</td>
	</tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

</table>

<table width="800">
	<tr>
		<td width="50"></td>
		<td width="100">
		<font face="Meiryo" color="#000000">
			<xsl:text>◆郵便番号</xsl:text>
		</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="申請者情報/郵便番号" />
		</font>
		</td>
	</tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

</table>


<table width="800">
	<tr>
		<td>
			<font face="Meiryo" color="#000000" >
				<xsl:text>　住所</xsl:text>
			</font>
		</td>
	</tr> <tr></tr><tr></tr>
</table>


<table width="800">
	<tr>
		<td width="50"></td>
		<td width="100">
			<font face="Meiryo" color="#000000">
				<xsl:text>◆漢字</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="申請者情報/住所" />
		</font>
		</td>
	</tr>
	<tr>
		<td width="50"></td>
		<td width="100">
			<font face="Meiryo" color="#000000">
				<xsl:text>◆フリガナ</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="申請者情報/住所フリガナ" />
		</font>
		</td>
	</tr>

<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

</table>


<table width="800">
	<tr>
		<td width="50"></td>
		<td width="150">
			<font face="Meiryo" color="#000000">
				<xsl:text>◆電話番号</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="590">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="申請者情報/電話番号" />
		</font>
		</td>
	</tr>
	<tr>
		<td width="50"></td>
		<td width="150">
			<font face="Meiryo" color="#000000">
				<xsl:text>FAX番号</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="590">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="申請者情報/FAX番号" />
		</font>
		</td>
	</tr>
	<tr>
		<td width="50"></td>
		<td width="150">
			<font face="Meiryo" color="#000000">
				<xsl:text>電子メールアドレス</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="590" style="word-break: break-all;">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="申請者情報/電子メールアドレス" />
		</font>
		</td>
	</tr>

<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

</table>


<table width="800">
	<tr>
		<td>
			<font face="Meiryo" color="#000000" >
				<xsl:text>▼連絡先に関する情報（※代理申請する場合は代理人に情報を入力してください。）</xsl:text>
			</font>
		</td>
	</tr> <tr></tr><tr></tr>
</table>


<table width="800">
	<tr>
		<td>
			<font face="Meiryo" color="#000000" >
				<xsl:text>　法人・団体の名称</xsl:text>
			</font>
		</td>
	</tr><tr></tr><tr></tr>
</table>

<table width="800">
	<tr>
		<td width="50"></td>
		<td width="100">
			<font face="Meiryo" color="#000000">
				<xsl:text>漢字</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="連絡先情報/法人団体名" />
		</font>
		</td>
	</tr>
	<tr>
		<td width="50"></td>
		<td width="100">
			<font face="Meiryo" color="#000000">
				<xsl:text>フリガナ</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="連絡先情報/法人団体名フリガナ" />
		</font>
		</td>
		
</tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
</table>

<table width="800">
	<tr>
		<td>
			<font face="Meiryo" color="#000000" >
				<xsl:text>　氏名（法人・団体の場合は代表者氏名）</xsl:text>
			</font>
		</td>
	</tr> <tr></tr><tr></tr>
</table>

<table width="800">
	<tr>
		<td width="50"></td>
		<td width="100">
			<font face="Meiryo" color="#000000">
				<xsl:text>◆漢字</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="連絡先情報/氏名" />
		</font>
		</td>
	</tr>
	<tr>
		<td width="50"></td>
		<td width="100">
			<font face="Meiryo" color="#000000">
				<xsl:text>◆フリガナ</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="連絡先情報/氏名フリガナ" />
		</font>
		</td>
	</tr>

<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

</table>

<table width="800">
	<tr>
		<td>
			<font face="Meiryo" color="#000000">
				<xsl:text>　部門の名称</xsl:text>
			</font>
		</td>
	</tr><tr></tr><tr></tr>
</table>

<table width="800">
	<tr>
		<td width="50"></td>
		<td width="100">
		<font face="Meiryo" color="#000000">
			<xsl:text>漢字</xsl:text>
		</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640" face="Meiryo">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="連絡先情報/部門名" />
		</font>
		</td>
	</tr>
	<tr>
		<td width="50"></td>
		<td width="100">
		<font face="Meiryo" color="#000000">
			<xsl:text>フリガナ</xsl:text>
		</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="連絡先情報/部門名フリガナ" />
		</font>
		</td>
	</tr>

<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

</table>

<table width="800">
	<tr>
		<td width="50"></td>
		<td width="100">
			<font face="Meiryo" color="#000000">
				<xsl:text> 役職</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="連絡先情報/役職" />
		</font>
		</td>
	</tr>

<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

</table>

<table width="800">
	<tr>
		<td width="50"></td>
		<td width="100">
		<font face="Meiryo" color="#000000">
			<xsl:text>◆郵便番号</xsl:text>
		</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>

		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="連絡先情報/郵便番号" />
		</font>
		</td>
	</tr>

<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

</table>


<table width="800">
	<tr>
		<td>
			<font face="Meiryo" color="#000000" >
				<xsl:text>　住所</xsl:text>
			</font>
		</td>
	</tr> <tr></tr><tr></tr>
</table>


<table width="800">
	<tr>
		<td width="50"></td>
		<td width="100">
			<font face="Meiryo" color="#000000">
				<xsl:text>◆漢字</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="連絡先情報/住所" />
		</font>
		</td>
	</tr>
	<tr>
		<td width="50"></td>
		<td width="100">
			<font face="Meiryo" color="#000000">
				<xsl:text>◆フリガナ</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="640">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="連絡先情報/住所フリガナ" />
		</font>
		</td>
	</tr>

<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

</table>

<table width="800">
	<tr>
		<td width="50"></td>
		<td width="180">
			<font face="Meiryo" color="#000000">
				<xsl:text>◆電話番号</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="560">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="連絡先情報/電話番号" />
		</font>
		</td>
	</tr>
	<tr>
		<td width="50"></td>
		<td width="180">
			<font face="Meiryo" color="#000000">
				<xsl:text>FAX番号</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="560">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="連絡先情報/FAX番号" />
		</font>
		</td>
	</tr>
	<tr>
		<td width="50"></td>
		<td width="180">
			<font face="Meiryo" color="#000000">
				<xsl:text>◆電子メールアドレス</xsl:text>
			</font>
		</td>
		<td width="10">
		<font face="Meiryo" color="#000000">
				<xsl:text>：</xsl:text>
		</font>
		</td>
		<td width="560" style="word-break: break-all;">
		<font face="Meiryo" color="#000000">
				<xsl:value-of select="連絡先情報/電子メールアドレス" />
		</font>
		</td>
	</tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
</table>


<xsl:if test="委任登録票添付情報/発行番号[not(.='')]">
<table width="800">
	<tr>
		<td>
		<font face="Meiryo" color="#000000">
			<xsl:text>　委任状登録票の添付</xsl:text>
		</font>
		</td>
	</tr>
</table>

<table width="800">
	<tr>
		<td width="50"></td>
		<td width="150">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="委任登録票添付情報/発行番号" />
		</font>
		</td>
		<td>
			<xsl:text>　</xsl:text>
			<font face="Meiryo" color="#000000">
			<xsl:value-of select="委任登録票添付情報/委任登録票ファイル名称" />
			</font>
		</td>
	</tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
</table>
</xsl:if>

</xsl:for-each>

</form>
</xsl:template>

<xsl:template match="DataRoot">

<form method="post" action="JSPservlet">

<br></br>



<xsl:if test="構成情報/提出先情報/提出先名称[not(.='')]">
<table width="800">
	<tr>
		<td>
			<font face="Meiryo" color="#000000">
				<xsl:text>▼提出先に関する情報 </xsl:text>
			</font>
		</td>
	</tr>
	<tr>
		<td>
			<font face="Meiryo" color="#000000">
			</font>
		</td>
	</tr>
</table>
<table width="800">
	<tr>
		<td width="150">
			<font face="Meiryo" color="#000000">
				<xsl:text>　　　　　◆提出先</xsl:text>
			</font>
		</td>
		<td width="650">
			<xsl:text>　</xsl:text>
			<font face="Meiryo" color="#000000">
			<xsl:value-of select="構成情報/提出先情報/提出先名称" />
			</font>
		</td>
	</tr>

<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
</table>
</xsl:if>



<!--
<xsl:if test="構成情報/府省照会情報/府省照会1/府省照会情報ラベル[not(.='')]">
<table width="800">
	<tr>
		<td>
			<font face="Meiryo" color="#000000">
				<xsl:text>▼府省照会情報</xsl:text>
			</font>
		</td>
	</tr>
	<tr>
		<td>
			<font face="Meiryo" color="#000000">
			</font>
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/府省照会情報/府省照会1/府省照会情報ラベル[not(.='')]">
<table width="800">
	<tr>
		<td>
			<xsl:text>　　　　　　</xsl:text>
			<xsl:value-of select="構成情報/府省照会情報/府省照会1" />
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/府省照会情報/府省照会2/府省照会情報ラベル[not(.='')]">
<table width="800">
	<tr>
		<td>
			<xsl:text>　　　　　　</xsl:text>
			<xsl:value-of select="構成情報/府省照会情報/府省照会2" />
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/府省照会情報/府省照会3/府省照会情報ラベル[not(.='')]">
<table width="800">
	<tr>
		<td>
			<xsl:text>　　　　　　</xsl:text>
			<xsl:value-of select="構成情報/府省照会情報/府省照会3" />
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/府省照会情報/府省照会4/府省照会情報ラベル[not(.='')]">
<table width="800">
	<tr>
		<td>
			<xsl:text>　　　　　　</xsl:text>
			<xsl:value-of select="構成情報/府省照会情報/府省照会4" />
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/府省照会情報/府省照会5/府省照会情報ラベル[not(.='')]">
<table width="800">
	<tr>
		<td>
			<xsl:text>　　　　　　</xsl:text>
			<xsl:value-of select="構成情報/府省照会情報/府省照会5" />
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/府省照会情報/府省照会6/府省照会情報ラベル[not(.='')]">
<table width="800">
	<tr>
		<td>
			<xsl:text>　　　　　　</xsl:text>
			<xsl:value-of select="構成情報/府省照会情報/府省照会6" />
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/府省照会情報/府省照会7/府省照会情報ラベル[not(.='')]">
<table width="800">
	<tr>
		<td>
			<xsl:text>　　　　　　</xsl:text>
			<xsl:value-of select="構成情報/府省照会情報/府省照会7" />
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/府省照会情報/府省照会8/府省照会情報ラベル[not(.='')]">
<table width="800">
	<tr>
		<td>
			<xsl:text>　　　　　　</xsl:text>
			<xsl:value-of select="構成情報/府省照会情報/府省照会8" />
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/府省照会情報/府省照会9/府省照会情報ラベル[not(.='')]">
<table width="800">
	<tr>
		<td>
			<xsl:text>　　　　　　</xsl:text>
			<xsl:value-of select="構成情報/府省照会情報/府省照会9" />
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/府省照会情報/府省照会10/府省照会情報ラベル[not(.='')]">
<table width="800">
	<tr>
		<td>
			<xsl:text>　　　　　　</xsl:text>
			<xsl:value-of select="構成情報/府省照会情報/府省照会10" />
		</td>
	</tr>
</table>
</xsl:if>
-->

<table width="800">
	<tr><td></td>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr></tr>
</table>

<xsl:if test="構成情報/手数料情報/手数料1/振込金額[not(.='')]">
<table width="800">
	<tr>
		<td>
			<font face="Meiryo" color="#000000">
				<xsl:text>▼納付額に関する情報</xsl:text>
			</font>
		</td>
	</tr>
	<tr>
		<td>
			<font face="Meiryo" color="#000000">
			</font>
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/手数料情報/手数料1/振込金額[not(.='')]">
<table width="800">
	<tr>
		<td width="250">
			<xsl:text>　　　　　　</xsl:text>
			<font face="Meiryo" color="#000000">
			<xsl:value-of select="構成情報/手数料情報/手数料1/略科目名" />
			</font>
		</td>
		<td width="150" face="Meiryo">
			<xsl:value-of select="構成情報/手数料情報/手数料1/振込金額" />
		</td>
		<td>
		<font face="Meiryo" color="#000000">
			<xsl:text>　円</xsl:text>
		</font>
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/手数料情報/手数料2/振込金額[not(.='')]">
<table width="800">
	<tr>
		<td width="250">
			<xsl:text>　　　　　　</xsl:text>
			<font face="Meiryo" color="#000000">
			<xsl:value-of select="構成情報/手数料情報/手数料2/略科目名" />
			</font>
		</td>
		<td width="150">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="構成情報/手数料情報/手数料2/振込金額" />
		</font>
		</td>
		<td>
		<font face="Meiryo" color="#000000">
			<xsl:text>　円</xsl:text>
		</font>
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/手数料情報/手数料3/振込金額[not(.='')]">
<table width="800">
	<tr>
		<td width="250">
			<xsl:text>　　　　　　</xsl:text>
			<font face="Meiryo" color="#000000">
			<xsl:value-of select="構成情報/手数料情報/手数料3/略科目名" />
			</font>
		</td>
		<td width="150">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="構成情報/手数料情報/手数料3/振込金額" />
		</font>
		</td>
		<td>
		<font face="Meiryo" color="#000000">
			<xsl:text>　円</xsl:text>
		</font>
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/手数料情報/手数料4/振込金額[not(.='')]">
<table width="800">
	<tr>
		<td width="250">
			<xsl:text>　　　　　　</xsl:text>
			<font face="Meiryo" color="#000000">
			<xsl:value-of select="構成情報/手数料情報/手数料4/略科目名" />
			</font>
		</td>

		<td width="150">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="構成情報/手数料情報/手数料4/振込金額" />
		</font>
		</td>
		<td>
		<font face="Meiryo" color="#000000">
			<xsl:text>　円</xsl:text>
		</font>
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/手数料情報/手数料5/振込金額[not(.='')]">
<table width="800">
	<tr>
		<td width="250">
			<xsl:text>　　　　　　</xsl:text>
			<font face="Meiryo" color="#000000">
			<xsl:value-of select="構成情報/手数料情報/手数料5/略科目名" />
			</font>
		</td>
		<td width="150">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="構成情報/手数料情報/手数料5/振込金額" />
		</font>
		</td>
		<td>
		<font face="Meiryo" color="#000000">
			<xsl:text>　円</xsl:text>
		</font>
		</td>
	</tr>
</table>
</xsl:if>

<xsl:if test="構成情報/手数料情報/手数料6/振込金額[not(.='')]">
<table width="800">
	<tr>
		<td width="250">
			<xsl:text>　　　　　　</xsl:text>
			<font face="Meiryo" color="#000000">
			<xsl:value-of select="構成情報/手数料情報/手数料6/略科目名" />
			</font>
		</td>
		<td width="150">
		<font face="Meiryo" color="#000000">
			<xsl:value-of select="構成情報/手数料情報/手数料6/振込金額" />
		</font>
		</td>
		<td>
		<font face="Meiryo" color="#000000">
			<xsl:text>　円</xsl:text>
		</font>
		</td>
	</tr>
</table>
</xsl:if>

</form>
</xsl:template>

<xsl:template name="kaigyo">
	<xsl:param name="value"/>
	<xsl:choose>
		<xsl:when test="contains($value,'&#10;')">
			<xsl:value-of select="normalize-space(substring-before($value,'&#10;'))"/>
			<BR/>
			<xsl:call-template name="kaigyo">
				<xsl:with-param name="value" select="substring-after($value,'&#10;')"/>
			</xsl:call-template>
		</xsl:when>
		<xsl:otherwise>
			<xsl:value-of select="$value"/>
		</xsl:otherwise>
	</xsl:choose>
</xsl:template>

</xsl:stylesheet>
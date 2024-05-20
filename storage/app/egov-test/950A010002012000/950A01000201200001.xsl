<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <xsl:output doctype-public="-//W3C//DTD HTML 4.01 Transitional//EN" encoding="UTF-8" indent="no" method="html" version="4.01" />
  <xsl:decimal-format NaN="" />
  <xsl:decimal-format NaN="" minus-sign="▲" name="tri-min" />
	<xsl:template match="/">
		<HTML LANG="ja">
			<HEAD>
			</HEAD>	
			<BODY>
			<FORM>
			<DIV style="position:relative; left:0px; top:0px; width:794px; height:2250px;">
			<xsl:apply-templates select="//G00002-A-250056-001_1"/>
			<xsl:apply-templates select="//G00002-A-250056-001_2"/>
			</DIV>
			</FORM>
			</BODY>
		</HTML>
</xsl:template>
  <xsl:template match="G00002-A-250056-001_1">
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:37px solid rgb(255, 255, 255); left:440px; top:861px; width:150px; height:37px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:440px; top:861px; width:150px; height:37px; text-align:right; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:12px 3px 0px 0px;</xsl:attribute>人</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:19px solid rgb(255, 255, 0); left:481px; top:869px; width:70px; height:19px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:481px; top:869px; width:70px; height:19px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(常用使用労働者数[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:35px solid rgb(255, 255, 255); left:160px; top:592px; width:135px; height:35px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:160px; top:592px; width:135px; height:35px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:24px solid rgb(255, 255, 255); left:106px; top:534px; width:28px; height:24px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:534px; width:28px; height:24px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:5px 0px 2px 0px;</xsl:attribute>－</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:53px solid rgb(255, 255, 255); left:518px; top:575px; width:248px; height:53px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px dashed rgb(0, 0, 0); border-right:1px dashed rgb(0, 0, 0); border-bottom:1px dashed rgb(0, 0, 0); border-left:1px dashed rgb(0, 0, 0); left:518px; top:575px; width:248px; height:53px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:35px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:53px solid rgb(255, 255, 255); left:419px; top:575px; width:100px; height:53px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px dashed rgb(0, 0, 0); border-right:1px dashed rgb(0, 0, 0); border-bottom:1px dashed rgb(0, 0, 0); border-left:1px dashed rgb(0, 0, 0); left:419px; top:575px; width:100px; height:53px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:35px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:43px solid rgb(255, 255, 255); left:539px; top:32px; width:195px; height:43px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px dashed rgb(0, 0, 0); border-right:1px dashed rgb(0, 0, 0); border-bottom:1px dashed rgb(0, 0, 0); border-left:1px dashed rgb(0, 0, 0); left:539px; top:32px; width:195px; height:43px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:25px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:49px solid rgb(255, 255, 255); left:381px; top:83px; width:88px; height:49px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px dashed rgb(0, 0, 0); border-right:1px dashed rgb(0, 0, 0); border-bottom:1px dashed rgb(0, 0, 0); border-left:1px dashed rgb(0, 0, 0); left:381px; top:83px; width:88px; height:49px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:31px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 255); left:76px; top:102px; width:88px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:76px; top:102px; width:88px; height:25px; text-align:left; font-size:20px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(帳票種別[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 0); left:122px; top:169px; width:106px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:122px; top:169px; width:106px; height:25px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(事業所番号[1]/事業所番号6桁[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 0); left:26px; top:268px; width:649px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:26px; top:268px; width:649px; height:25px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:5px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(事業所の名称カタカナ[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:45px solid rgb(255, 255, 0); left:26px; top:326px; width:649px; height:45px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:26px; top:326px; width:649px; height:45px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:13px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(変更後[1]/事業所名称[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:47px solid rgb(255, 255, 0); left:26px; top:458px; width:649px; height:47px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:26px; top:458px; width:649px; height:47px; text-align:left; font-size:44px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:14px; height:14px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(変更後[1]/事業所所在地[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 0); left:26px; top:534px; width:77px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:26px; top:534px; width:77px; height:25px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(事業所の電話番号[1]/市外局番[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:48px solid rgb(255, 255, 255); left:26px; top:579px; width:20px; height:48px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:26px; top:579px; width:20px; height:48px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:30px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 255); left:45px; top:579px; width:44px; height:14px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:45px; top:579px; width:44px; height:14px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 4px 0px 7px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>府県</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 255); left:88px; top:579px; width:26px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:88px; top:579px; width:26px; height:14px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>所掌</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 255); left:113px; top:579px; width:48px; height:14px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:113px; top:579px; width:48px; height:14px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 5px 0px 5px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>管轄</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:35px solid rgb(255, 255, 255); left:45px; top:592px; width:44px; height:35px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:45px; top:592px; width:44px; height:35px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:35px solid rgb(255, 255, 255); left:88px; top:592px; width:26px; height:35px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:88px; top:592px; width:26px; height:35px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:35px solid rgb(255, 255, 255); left:113px; top:592px; width:48px; height:35px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:113px; top:592px; width:48px; height:35px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:35px solid rgb(255, 255, 255); left:294px; top:592px; width:74px; height:35px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:294px; top:592px; width:74px; height:35px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:207px solid rgb(255, 255, 255); left:26px; top:643px; width:18px; height:207px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:26px; top:643px; width:18px; height:207px; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:22px 0px 22px 0px; display:block; text-align:justify; text-justify:distribute-all-lines; writing-mode:tb-rl;</xsl:attribute>
              </xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:70px solid rgb(255, 255, 255); left:60px; top:643px; width:77px; height:70px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:60px; top:643px; width:77px; height:70px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:52px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:28px solid rgb(255, 255, 0); left:136px; top:643px; width:229px; height:28px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px dashed rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:136px; top:643px; width:229px; height:28px; text-align:left; font-size:25px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:8px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(変更事項[1]/事業主[1]/住所フリガナ[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:70px solid rgb(255, 255, 255); left:364px; top:643px; width:120px; height:70px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:364px; top:643px; width:120px; height:70px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:52px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:70px solid rgb(255, 255, 255); left:60px; top:712px; width:77px; height:70px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:60px; top:712px; width:77px; height:70px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:52px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:28px solid rgb(255, 255, 0); left:136px; top:712px; width:229px; height:28px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px dashed rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:136px; top:712px; width:229px; height:28px; text-align:left; font-size:25px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:8px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(変更事項[1]/事業主[1]/名称フリガナ[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:70px solid rgb(255, 255, 255); left:364px; top:712px; width:120px; height:70px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:364px; top:712px; width:120px; height:70px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:52px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:69px solid rgb(255, 255, 255); left:60px; top:781px; width:77px; height:69px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:60px; top:781px; width:77px; height:69px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:51px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:27px solid rgb(255, 255, 0); left:136px; top:781px; width:229px; height:27px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px dashed rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:136px; top:781px; width:229px; height:27px; text-align:left; font-size:24px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:8px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(変更事項[1]/事業主[1]/氏名フリガナ[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:41px solid rgb(255, 255, 255); left:364px; top:781px; width:77px; height:41px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:364px; top:781px; width:77px; height:41px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:23px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:41px solid rgb(255, 255, 255); left:440px; top:781px; width:150px; height:41px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:440px; top:781px; width:150px; height:41px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:23px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:53px solid rgb(255, 255, 255); left:589px; top:781px; width:73px; height:53px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:589px; top:781px; width:73px; height:53px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:35px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:53px solid rgb(255, 255, 255); left:661px; top:781px; width:107px; height:53px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:661px; top:781px; width:107px; height:53px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:35px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:41px solid rgb(255, 255, 255); left:364px; top:821px; width:77px; height:41px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:364px; top:821px; width:77px; height:41px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:23px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:41px solid rgb(255, 255, 255); left:440px; top:821px; width:150px; height:41px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:440px; top:821px; width:150px; height:41px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:23px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:54px solid rgb(255, 255, 255); left:26px; top:853px; width:111px; height:54px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:26px; top:853px; width:111px; height:54px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:21px 3px 0px 3px;</xsl:attribute>15変更後の事業の概要</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:54px solid rgb(255, 255, 0); left:136px; top:853px; width:229px; height:54px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:136px; top:853px; width:229px; height:54px; text-align:left; font-size:51px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:10px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(変更後の事業の概要[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:61px solid rgb(255, 255, 255); left:589px; top:833px; width:58px; height:61px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:589px; top:833px; width:58px; height:61px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:43px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:31px solid rgb(255, 255, 255); left:646px; top:833px; width:41px; height:31px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:646px; top:833px; width:41px; height:31px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:9px 7px 7px 6px;</xsl:attribute>一　般</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:31px solid rgb(255, 255, 255); left:686px; top:833px; width:82px; height:31px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:686px; top:833px; width:82px; height:31px; text-align:right; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:9px 0px 0px 0px;</xsl:attribute>人</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:31px solid rgb(255, 255, 255); left:646px; top:863px; width:41px; height:31px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:646px; top:863px; width:41px; height:31px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:10px 8px 7px 7px;</xsl:attribute>日　雇</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:31px solid rgb(255, 255, 255); left:686px; top:863px; width:82px; height:31px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:686px; top:863px; width:82px; height:31px; text-align:right; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:9px 0px 0px 0px;</xsl:attribute>人</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:37px solid rgb(255, 255, 255); left:364px; top:861px; width:77px; height:37px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:364px; top:861px; width:77px; height:37px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:19px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:47px solid rgb(255, 255, 255); left:26px; top:906px; width:111px; height:47px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:26px; top:906px; width:111px; height:47px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:16px 7px 0px 7px;</xsl:attribute>16<xsl:call-template name="adam-nbsp" />変<xsl:call-template name="adam-nbsp" />更<xsl:call-template name="adam-nbsp" />の<xsl:call-template name="adam-nbsp" />理<xsl:call-template name="adam-nbsp" />由</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:47px solid rgb(255, 255, 0); left:136px; top:906px; width:229px; height:47px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:136px; top:906px; width:229px; height:47px; text-align:left; font-size:44px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:10px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(変更理由[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:60px solid rgb(255, 255, 255); left:589px; top:893px; width:58px; height:60px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:589px; top:893px; width:58px; height:60px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:42px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:30px solid rgb(255, 255, 255); left:646px; top:893px; width:41px; height:30px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:646px; top:893px; width:45px; height:30px; text-align:left; font-size:7px; font-family:'ＭＳ ゴシック', sans-serif; padding:10px 0px 7px 0px;</xsl:attribute>賃金締切日</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:30px solid rgb(255, 255, 255); left:686px; top:893px; width:82px; height:30px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:686px; top:893px; width:82px; height:30px; text-align:right; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:9px 0px 0px 0px;</xsl:attribute>日</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:56px solid rgb(255, 255, 255); left:364px; top:897px; width:77px; height:56px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:364px; top:897px; width:77px; height:56px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:38px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:56px solid rgb(255, 255, 255); left:440px; top:897px; width:150px; height:56px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:440px; top:897px; width:150px; height:56px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:38px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:31px solid rgb(255, 255, 255); left:646px; top:922px; width:41px; height:31px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:646px; top:922px; width:45px; height:31px; text-align:left; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:10px 0px 7px 0px;</xsl:attribute>賃金支払日</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:31px solid rgb(255, 255, 255); left:686px; top:922px; width:82px; height:31px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:686px; top:922px; width:82px; height:31px; text-align:right; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:9px 0px 0px 0px;</xsl:attribute>日</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:54px solid rgb(255, 255, 255); left:26px; top:952px; width:111px; height:54px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:26px; top:952px; width:111px; height:54px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:20px 24px 0px 17px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>備考</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:54px solid rgb(255, 255, 0); left:136px; top:952px; width:229px; height:54px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:136px; top:952px; width:229px; height:54px; text-align:left; font-size:51px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:10px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(備考[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:39px solid rgb(255, 255, 255); left:426px; top:956px; width:15px; height:39px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:426px; top:956px; width:15px; height:39px; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; padding:4px 1px 3px 2px; display:block; text-align:justify; text-justify:distribute-all-lines; writing-mode:tb-rl;</xsl:attribute>
              </xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:39px solid rgb(255, 255, 255); left:440px; top:956px; width:44px; height:39px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:440px; top:956px; width:44px; height:39px; text-align:center; font-size:1px; font-family:'ＭＳ 明朝', serif; padding:8px 35px 27px 5px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>
              </xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:39px solid rgb(255, 255, 255); left:483px; top:956px; width:15px; height:39px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:483px; top:956px; width:15px; height:39px; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; padding:3px 1px 4px 3px; display:block; text-align:justify; text-justify:distribute-all-lines; writing-mode:tb-rl;</xsl:attribute>
              </xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:384px; top:913px; width:50px; height:11px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:384px; top:913px; width:50px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>雇用保険</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:384px; top:928px; width:49px; height:11px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:384px; top:928px; width:49px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>担当課名</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:605px; top:910px; width:38px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:605px; top:910px; width:38px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>賃金</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:601px; top:928px; width:45px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:601px; top:928px; width:45px; height:12px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>支払関係</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:384px; top:868px; width:49px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:384px; top:868px; width:49px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>常時使用</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:384px; top:882px; width:48px; height:11px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:384px; top:882px; width:48px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>労働者数</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:595px; top:852px; width:45px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:595px; top:852px; width:45px; height:12px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>雇用保険</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:591px; top:872px; width:53px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:591px; top:872px; width:53px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>被保険者数</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:371px; top:829px; width:60px; height:11px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:829px; width:60px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>※事 業 の</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:384px; top:842px; width:51px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:384px; top:842px; width:51px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>廃止年月日</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:4px solid rgb(255, 255, 255); left:690px; top:792px; width:9px; height:4px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:690px; top:792px; width:9px; height:4px; font-size:8px; font-family:'ＭＳ 明朝', serif; writing-mode:tb-rl;</xsl:attribute>,</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:686px; top:789px; width:47px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:686px; top:789px; width:47px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>健康保険</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:686px; top:803px; width:67px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:686px; top:803px; width:67px; height:12px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>厚生年金保険</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:10px solid rgb(255, 255, 255); left:686px; top:817px; width:43px; height:10px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:686px; top:817px; width:43px; height:10px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>労災保険</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:607px; top:793px; width:46px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:607px; top:793px; width:46px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>社会保険</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:607px; top:810px; width:46px; height:11px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:607px; top:810px; width:46px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>加入状況</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:386px; top:788px; width:49px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:386px; top:788px; width:49px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>事業の</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:382px; top:803px; width:56px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:382px; top:803px; width:56px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>開始年月日</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:72px; top:815px; width:50px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:72px; top:815px; width:50px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>氏名</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:374px; top:739px; width:11px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:374px; top:739px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>18</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:368px; top:753px; width:111px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:368px; top:753px; width:111px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>変更前の事業所の所在地</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:73px; top:753px; width:50px; height:11px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:73px; top:753px; width:50px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>名称</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:374px; top:669px; width:11px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:374px; top:669px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>17</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:372px; top:685px; width:108px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:372px; top:685px; width:108px; height:12px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>変更前の事業所の名称</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:76px; top:655px; width:41px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:68px; top:655px; width:57px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>(フリガナ)</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:73px; top:678px; width:51px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:73px; top:678px; width:51px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>住所</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:7px solid rgb(255, 255, 255); left:70px; top:691px; width:53px; height:7px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:70px; top:691px; width:53px; height:7px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>法人のときは主た</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:8px solid rgb(255, 255, 255); left:28px; top:589px; width:8px; height:8px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:28px; top:589px; width:8px; height:8px; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; writing-mode:tb-rl;</xsl:attribute>労</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:538px; top:18px; width:231px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:538px; top:18px; width:231px; height:9px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>(必ず記載要領の注意事項を読んでから記載してください。)</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:19px solid rgb(255, 255, 255); left:193px; top:27px; width:318px; height:19px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:193px; top:27px; width:318px; height:19px; text-align:center; font-size:17px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>雇用保険事業主事業所各種変更届</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:542px; top:36px; width:68px; height:11px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:542px; top:36px; width:68px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>※事業所番号</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:76px; top:87px; width:44px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:76px; top:87px; width:44px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>帳票種別</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:385px; top:86px; width:64px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:385px; top:86px; width:64px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>※１変更区分</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:364px; top:156px; width:146px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:364px; top:156px; width:146px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>４設置年月日(元号－年月日)</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:521px; top:95px; width:151px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:521px; top:95px; width:151px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>２変更年月日（元号－年月日）</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:10px solid rgb(255, 255, 255); left:595px; top:117px; width:11px; height:10px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:595px; top:117px; width:15px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>年</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:27px; top:156px; width:65px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:27px; top:156px; width:65px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>３事業所番号</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:26px solid rgb(255, 255, 255); left:99px; top:168px; width:22px; height:26px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:99px; top:168px; width:22px; height:26px; text-align:center; font-size:18px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;</xsl:attribute>-</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:10px solid rgb(255, 255, 255); left:654px; top:117px; width:65px; height:10px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:654px; top:117px; width:15px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック',sans-serif;</xsl:attribute>月</xsl:element>
            </PRE>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:708px; top:117px; width:15px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック',sans-serif;</xsl:attribute>日</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:10px solid rgb(255, 255, 255); left:487px; top:177px; width:125px; height:10px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:485px; top:177px; width:15px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>年</xsl:element>
            </PRE>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:543px; top:177px; width:15px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>月</xsl:element>
            </PRE>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:600px; top:177px; width:16px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>日</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:26px; top:255px; width:145px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:26px; top:255px; width:145px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>５事業所の名称(カタカナ)</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:26px; top:312px; width:118px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:26px; top:312px; width:118px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>６事業所の名称(漢字)</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:26px; top:388px; width:54px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:26px; top:388px; width:54px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>７郵便番号</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:26px; top:445px; width:130px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:26px; top:445px; width:130px; height:12px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>８事業所の所在地(漢字)</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:28px; top:521px; width:101px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:28px; top:521px; width:101px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>９ 事業所の電話番号</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:433px; top:579px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:433px; top:579px; width:12px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>※</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:431px; top:590px; width:80px; height:13px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:431px; top:590px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>公共職業安定所</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:431px; top:605px; width:80px; height:13px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:431px; top:605px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>記載欄</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:521px; top:582px; width:52px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:521px; top:582px; width:59px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>11設置区分</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:605px; top:582px; width:59px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:598px; top:582px; width:70px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>12事業所区分</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:697px; top:582px; width:49px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:697px; top:582px; width:57px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>13産業分類</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:26px; top:1013px; width:370px; height:11px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:26px; top:1013px; width:370px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>(この届出は、変更のあった日の翌日から起算して10日以内に提出してください。)</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:411px; top:957px; width:13px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:411px; top:957px; width:13px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>※</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:24px solid rgb(255, 255, 0); left:553px; top:110px; width:40px; height:24px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:553px; top:110px; width:40px; height:24px; text-align:right; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(変更年月日[1]/年[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:24px solid rgb(255, 255, 0); left:610px; top:110px; width:40px; height:24px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:610px; top:110px; width:40px; height:24px; text-align:right; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(変更年月日[1]/月[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:24px solid rgb(255, 255, 0); left:667px; top:110px; width:40px; height:24px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:667px; top:110px; width:40px; height:24px; text-align:right; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(変更年月日[1]/日[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:20px solid rgb(255, 255, 255); left:551px; top:51px; width:177px; height:20px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:551px; top:51px; width:177px; height:20px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(事業所番号欄[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 0); left:26px; top:169px; width:72px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:26px; top:169px; width:72px; height:25px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(事業所番号[1]/事業所番号4桁[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:26px solid rgb(255, 255, 255); left:231px; top:168px; width:21px; height:26px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:231px; top:168px; width:21px; height:26px; text-align:center; font-size:18px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;</xsl:attribute>-</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:15px solid rgb(255, 255, 255); left:421px; top:174px; width:20px; height:15px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:421px; top:174px; width:20px; height:15px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>-</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 0); left:443px; top:171px; width:40px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:443px; top:171px; width:40px; height:25px; text-align:right; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(設置年月日[1]/年[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 0); left:501px; top:171px; width:40px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:501px; top:171px; width:40px; height:25px; text-align:right; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(設置年月日[1]/月[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 0); left:558px; top:171px; width:40px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:558px; top:171px; width:40px; height:25px; text-align:right; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(設置年月日[1]/日[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 0); left:106px; top:402px; width:72px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:106px; top:402px; width:72px; height:25px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(変更後[1]/郵便番号[1]/町域番号[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 0); left:26px; top:402px; width:53px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:26px; top:402px; width:53px; height:25px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(変更後[1]/郵便番号[1]/配達局番号[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:24px solid rgb(255, 255, 255); left:81px; top:402px; width:24px; height:24px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:81px; top:402px; width:24px; height:24px; text-align:center; font-size:20px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>－</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 0); left:135px; top:534px; width:77px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:135px; top:534px; width:77px; height:25px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(事業所の電話番号[1]/市内局番[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 0); left:243px; top:534px; width:78px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:243px; top:534px; width:78px; height:25px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(事業所の電話番号[1]/加入者番号[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:24px solid rgb(255, 255, 255); left:214px; top:534px; width:27px; height:24px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:214px; top:534px; width:27px; height:24px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:5px 0px 2px 0px;</xsl:attribute>－</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 255); left:294px; top:579px; width:74px; height:14px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:294px; top:579px; width:74px; height:14px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 11px 0px 11px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>枝番号</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 255); left:556px; top:595px; width:9px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:556px; top:595px; width:9px; height:25px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:11px 0px 0px 0px;</xsl:attribute>[</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:566px; top:602px; width:10px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:566px; top:602px; width:10px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>1:</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:577px; top:602px; width:18px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:577px; top:602px; width:18px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>当然</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:577px; top:612px; width:18px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:577px; top:612px; width:18px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>任意</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:566px; top:612px; width:10px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:566px; top:612px; width:10px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>2:</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:649px; top:602px; width:10px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:649px; top:602px; width:10px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>1:</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:649px; top:612px; width:10px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:649px; top:612px; width:10px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>2:</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:661px; top:602px; width:17px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:661px; top:602px; width:17px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>個別</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:661px; top:612px; width:17px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:661px; top:612px; width:17px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>委託</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:24px solid rgb(255, 255, 255); left:702px; top:599px; width:40px; height:24px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:702px; top:599px; width:40px; height:24px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(産業分類[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:207px solid rgb(255, 255, 255); left:43px; top:643px; width:18px; height:207px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:43px; top:643px; width:18px; height:207px; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:30px 0px 30px 0px; display:block; text-align:justify; text-justify:distribute-all-lines; writing-mode:tb-rl;</xsl:attribute>
              </xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:6px solid rgb(255, 255, 255); left:70px; top:699px; width:53px; height:6px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:70px; top:699px; width:53px; height:6px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>る事務所の所在地</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:76px; top:720px; width:41px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:68px; top:720px; width:58px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>(フリガナ)</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:10px solid rgb(255, 255, 255); left:76px; top:790px; width:41px; height:10px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:68px; top:790px; width:58px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>(フリガナ)</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:7px solid rgb(255, 255, 255); left:74px; top:827px; width:46px; height:7px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:74px; top:827px; width:46px; height:7px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>法人のときは</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:7px solid rgb(255, 255, 255); left:74px; top:835px; width:46px; height:7px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:74px; top:835px; width:46px; height:7px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>代表者の氏名</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:19px solid rgb(255, 255, 255); left:65px; top:826px; width:7px; height:19px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:65px; top:826px; width:7px; height:19px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;</xsl:attribute>[</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:401px; top:655px; width:40px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:393px; top:655px; width:58px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>(フリガナ)</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:28px solid rgb(255, 255, 0); left:483px; top:643px; width:285px; height:28px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px dashed rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:483px; top:643px; width:285px; height:28px; text-align:left; font-size:25px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:8px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(変更前[1]/変更前の事業所の名称フリガナ[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:28px solid rgb(255, 255, 0); left:483px; top:712px; width:285px; height:28px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px dashed rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:483px; top:712px; width:285px; height:28px; text-align:left; font-size:25px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:8px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(変更前[1]/変更前の事業所の所在地フリガナ[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:403px; top:720px; width:41px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:393px; top:720px; width:58px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>(フリガナ)</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:43px solid rgb(255, 255, 0); left:136px; top:670px; width:229px; height:43px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px dashed rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:136px; top:670px; width:229px; height:43px; text-align:left; font-size:40px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:10px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(変更事項[1]/事業主[1]/住所[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:43px solid rgb(255, 255, 0); left:136px; top:739px; width:229px; height:43px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px dashed rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:136px; top:739px; width:229px; height:43px; text-align:left; font-size:40px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:10px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(変更事項[1]/事業主[1]/名称[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:43px solid rgb(255, 255, 0); left:136px; top:807px; width:229px; height:43px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px dashed rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:136px; top:807px; width:229px; height:43px; text-align:left; font-size:40px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:11px; height:11px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(変更事項[1]/事業主[1]/氏名[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:43px solid rgb(255, 255, 0); left:483px; top:670px; width:285px; height:43px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px dashed rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:483px; top:670px; width:285px; height:43px; text-align:left; font-size:40px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:10px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(変更前[1]/事業所名称[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:43px solid rgb(255, 255, 0); left:483px; top:739px; width:285px; height:43px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px dashed rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:483px; top:739px; width:285px; height:43px; text-align:left; font-size:40px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:10px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(変更前[1]/事業所所在地[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:371px; top:788px; width:12px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:788px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>19</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:371px; top:842px; width:12px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:842px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>20</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:371px; top:868px; width:12px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:868px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>21</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:371px; top:912px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:912px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>22</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 0); left:484px; top:796px; width:22px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:484px; top:796px; width:22px; height:14px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(事業の開始年月日[1]/年[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 0); left:518px; top:796px; width:23px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:518px; top:796px; width:23px; height:14px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(事業の開始年月日[1]/月[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 0); left:553px; top:796px; width:22px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:553px; top:796px; width:22px; height:14px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(事業の開始年月日[1]/日[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:772px; top:834px; width:22px; height:14px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:2px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(事業の廃止年月日[1]/年号[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 255); left:484px; top:834px; width:22px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:484px; top:834px; width:22px; height:14px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(事業の廃止年月日[1]/年[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:507px; top:837px; width:11px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:507px; top:837px; width:11px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>年</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 255); left:518px; top:834px; width:22px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:518px; top:834px; width:22px; height:14px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(事業の廃止年月日[1]/月[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 255); left:553px; top:834px; width:22px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:553px; top:834px; width:22px; height:14px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(事業の廃止年月日[1]/日[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:594px; top:793px; width:11px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:594px; top:793px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>23</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:595px; top:837px; width:11px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:595px; top:837px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>24</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:591px; top:910px; width:11px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:591px; top:910px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>25</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:39px solid rgb(255, 255, 255); left:497px; top:956px; width:44px; height:39px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:497px; top:956px; width:44px; height:39px; text-align:center; font-size:1px; font-family:'ＭＳ 明朝', serif; padding:8px 35px 27px 5px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>
              </xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:39px solid rgb(255, 255, 255); left:540px; top:956px; width:14px; height:39px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:540px; top:956px; width:14px; height:39px; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; padding:4px 1px 3px 2px; display:block; text-align:justify; text-justify:distribute-all-lines; writing-mode:tb-rl;</xsl:attribute>
              </xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:39px solid rgb(255, 255, 255); left:553px; top:956px; width:45px; height:39px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:553px; top:956px; width:45px; height:39px; text-align:center; font-size:1px; font-family:'ＭＳ 明朝', serif; padding:8px 35px 27px 5px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>
              </xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:39px solid rgb(255, 255, 255); left:597px; top:956px; width:15px; height:39px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:597px; top:956px; width:15px; height:39px; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; padding:3px 1px 4px 3px; display:block; text-align:justify; text-justify:distribute-all-lines; writing-mode:tb-rl;</xsl:attribute>
              </xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:39px solid rgb(255, 255, 255); left:611px; top:956px; width:44px; height:39px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:611px; top:956px; width:44px; height:39px; text-align:center; font-size:1px; font-family:'ＭＳ 明朝', serif; padding:8px 35px 27px 5px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>
              </xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:39px solid rgb(255, 255, 255); left:654px; top:956px; width:14px; height:39px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:654px; top:956px; width:14px; height:39px; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; padding:4px 1px 3px 2px; display:block; text-align:justify; text-justify:distribute-all-lines; writing-mode:tb-rl;</xsl:attribute>
              </xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:39px solid rgb(255, 255, 255); left:667px; top:956px; width:44px; height:39px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:667px; top:956px; width:44px; height:39px; text-align:center; font-size:1px; font-family:'ＭＳ 明朝', serif; padding:8px 35px 27px 5px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>
              </xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:39px solid rgb(255, 255, 255); left:710px; top:956px; width:16px; height:39px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:710px; top:956px; width:16px; height:39px; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; padding:3px 1px 4px 3px; display:block; text-align:justify; text-justify:distribute-all-lines; writing-mode:tb-rl;</xsl:attribute>
              </xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:39px solid rgb(255, 255, 255); left:725px; top:956px; width:44px; height:39px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:725px; top:956px; width:44px; height:39px; text-align:center; font-size:1px; font-family:'ＭＳ 明朝', serif; padding:8px 35px 27px 5px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>
              </xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 255); left:160px; top:579px; width:135px; height:14px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:160px; top:579px; width:135px; height:14px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 38px 0px 38px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>基幹番号</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:15px solid rgb(255, 255, 0); left:704px; top:841px; width:47px; height:15px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:704px; top:841px; width:47px; height:15px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(雇用保険被保険者数[1]/一般[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:15px solid rgb(255, 255, 0); left:704px; top:871px; width:47px; height:15px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:704px; top:871px; width:47px; height:15px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(雇用保険被保険者数[1]/日雇[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 0); left:701px; top:900px; width:51px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:701px; top:900px; width:51px; height:14px; text-align:right; font-size:8px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(賃金支払関係[1]/賃金締切日[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:571px; top:906px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:571px; top:906px; width:12px; height:11px; text-align:left; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>課</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:571px; top:931px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:571px; top:931px; width:12px; height:11px; text-align:left; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>係</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:21px solid rgb(255, 255, 0); left:462px; top:901px; width:103px; height:21px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:462px; top:901px; width:103px; height:21px; text-align:left; font-size:20px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:8px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(雇用保険担当課名[1]/課[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:21px solid rgb(255, 255, 0); left:462px; top:925px; width:103px; height:21px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:462px; top:925px; width:103px; height:21px; text-align:left; font-size:20px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:8px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(雇用保険担当課名[1]/係[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:21px solid rgb(255, 255, 0); left:726px; top:927px; width:31px; height:21px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:726px; top:927px; width:31px; height:21px; text-align:right; font-size:20px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:8px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(賃金支払関係[1]/賃金支払日[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:666px; top:789px; width:17px; line-height:11px; height:11px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 30px; white-space:nowrap;</xsl:attribute>
              <xsl:element name="INPUT">
                <xsl:attribute name="type">CHECKBOX</xsl:attribute>
                <xsl:attribute name="style">position:absolute; top:1px; left:4px; box-sizing:border-box; -moz-box-sizing:border-box; width:9px; height:9px;</xsl:attribute>
                <xsl:attribute name="name">J59_健康保険</xsl:attribute>
                <xsl:attribute name="id">005FJ59_005F_8C92_8D4E_95DB_8CAF</xsl:attribute>
                <xsl:attribute name="tabindex">53</xsl:attribute>
                <xsl:attribute name="value">1</xsl:attribute>
                <xsl:if test="社会保険加入状況[1]/健康保険[1]/text()[1][. = '1']">
                  <xsl:attribute name="checked">checked</xsl:attribute>
                </xsl:if>
                <xsl:if test="not(社会保険加入状況[1]/健康保険[1]/text()[1][. = '1'])">
                  <xsl:attribute name="disabled">disabled</xsl:attribute>
                </xsl:if>
                <xsl:attribute name="onClick">this.checked = true;</xsl:attribute>
              </xsl:element>
              <SPAN style="font-size:14px; height:14px; vertical-align:middle;">
                <xsl:call-template name="adam-nbsp" />
              </SPAN>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:666px; top:802px; width:17px; line-height:11px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 30px; white-space:nowrap;</xsl:attribute>
              <xsl:element name="INPUT">
                <xsl:attribute name="type">CHECKBOX</xsl:attribute>
                <xsl:attribute name="style">position:absolute; top:1px; left:4px; box-sizing:border-box; -moz-box-sizing:border-box; width:9px; height:9px;</xsl:attribute>
                <xsl:attribute name="name">J60_厚生年金保険</xsl:attribute>
                <xsl:attribute name="id">005FJ60_005F_8CFA_90B6_944E_8BE0_95DB_8CAF</xsl:attribute>
                <xsl:attribute name="tabindex">54</xsl:attribute>
                <xsl:attribute name="value">1</xsl:attribute>
                <xsl:if test="社会保険加入状況[1]/厚生年金保険[1]/text()[1][. = '1']">
                  <xsl:attribute name="checked">checked</xsl:attribute>
                </xsl:if>
                <xsl:if test="not(社会保険加入状況[1]/厚生年金保険[1]/text()[1][. = '1'])">
                  <xsl:attribute name="disabled">disabled</xsl:attribute>
                </xsl:if>
                <xsl:attribute name="onClick">this.checked = true;</xsl:attribute>
              </xsl:element>
              <SPAN style="font-size:14px; height:14px; vertical-align:middle;">
                <xsl:call-template name="adam-nbsp" />
              </SPAN>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:666px; top:816px; width:17px; line-height:11px; height:11px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 30px; white-space:nowrap;</xsl:attribute>
              <xsl:element name="INPUT">
                <xsl:attribute name="type">CHECKBOX</xsl:attribute>
                <xsl:attribute name="style">position:absolute; top:1px; left:4px; box-sizing:border-box; -moz-box-sizing:border-box; width:9px; height:9px;</xsl:attribute>
                <xsl:attribute name="name">J61_労災保険</xsl:attribute>
                <xsl:attribute name="id">005FJ61_005F_984A_8DD0_95DB_8CAF</xsl:attribute>
                <xsl:attribute name="tabindex">55</xsl:attribute>
                <xsl:attribute name="value">1</xsl:attribute>
                <xsl:if test="社会保険加入状況[1]/労災保険[1]/text()[1][. = '1']">
                  <xsl:attribute name="checked">checked</xsl:attribute>
                </xsl:if>
                <xsl:if test="not(社会保険加入状況[1]/労災保険[1]/text()[1][. = '1'])">
                  <xsl:attribute name="disabled">disabled</xsl:attribute>
                </xsl:if>
                <xsl:attribute name="onClick">this.checked = true;</xsl:attribute>
              </xsl:element>
              <SPAN style="font-size:14px; height:14px; vertical-align:middle;">
                <xsl:call-template name="adam-nbsp" />
              </SPAN>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-left:1px solid rgb(0, 0, 0); left:26px; top:848px; width:1px; height:4px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-left:1px solid rgb(0, 0, 0); left:136px; top:848px; width:1px; height:4px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:7px solid rgb(255, 255, 255); left:28px; top:581px; width:8px; height:7px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:28px; top:581px; width:8px; height:7px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>10</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:45px; top:669px; width:13px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:45px; top:669px; width:13px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>14</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:19px solid rgb(255, 255, 255); left:406px; top:103px; width:21px; height:19px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:406px; top:103px; width:21px; height:19px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 1px;</xsl:attribute>
              <xsl:if test="変更区分[1]/text()[1][. = '']">
                <xsl:call-template name="adam-nbsp" />
              </xsl:if>
              <xsl:if test="変更区分[1]/text()[1][. = '1']">1</xsl:if>
              <xsl:if test="変更区分[1]/text()[1][. = '2']">2</xsl:if>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 0); left:254px; top:169px; width:20px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:254px; top:169px; width:20px; height:25px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(事業所番号[1]/事業所番号CD[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:19px solid rgb(255, 255, 0); left:364px; top:173px; width:50px; height:19px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:364px; top:173px; width:50px; height:19px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 1px;</xsl:attribute>
              <xsl:if test="設置年月日[1]/年号[1]/text()[1][. = '']">
                <xsl:call-template name="adam-nbsp" />
              </xsl:if>
              <xsl:if test="設置年月日[1]/年号[1]/text()[1][. = '昭和']">昭和</xsl:if>
              <xsl:if test="設置年月日[1]/年号[1]/text()[1][. = '平成']">平成</xsl:if>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:19px solid rgb(255, 255, 255); left:370px; top:595px; width:27px; height:19px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:370px; top:595px; width:27px; height:19px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 3px; display:none;</xsl:attribute>
              <xsl:if test="労働保険番号未入力[1]/text()[1][. = '']">
                <xsl:call-template name="adam-nbsp" />
              </xsl:if>
              <xsl:if test="労働保険番号未入力[1]/text()[1][. = '3']">3</xsl:if>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:20px solid rgb(255, 255, 255); left:523px; top:601px; width:23px; height:20px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:523px; top:601px; width:23px; height:20px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 1px;</xsl:attribute>
              <xsl:if test="設置区分[1]/text()[1][. = '']">
                <xsl:call-template name="adam-nbsp" />
              </xsl:if>
              <xsl:if test="設置区分[1]/text()[1][. = '1']">1</xsl:if>
              <xsl:if test="設置区分[1]/text()[1][. = '2']">2</xsl:if>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:20px solid rgb(255, 255, 255); left:606px; top:601px; width:23px; height:20px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:606px; top:601px; width:23px; height:20px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 1px;</xsl:attribute>
              <xsl:if test="事業所区分[1]/text()[1][. = '']">
                <xsl:call-template name="adam-nbsp" />
              </xsl:if>
              <xsl:if test="事業所区分[1]/text()[1][. = '1']">1</xsl:if>
              <xsl:if test="事業所区分[1]/text()[1][. = '2']">2</xsl:if>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 0); left:445px; top:796px; width:30px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:445px; top:796px; width:30px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:2px 0px 0px 2px;</xsl:attribute>
              <xsl:if test="事業の開始年月日[1]/年号[1]/text()[1][. = '']">
                <xsl:call-template name="adam-nbsp" />
              </xsl:if>
              <xsl:if test="事業の開始年月日[1]/年号[1]/text()[1][. = '明治']">明治</xsl:if>
              <xsl:if test="事業の開始年月日[1]/年号[1]/text()[1][. = '大正']">大正</xsl:if>
              <xsl:if test="事業の開始年月日[1]/年号[1]/text()[1][. = '昭和']">昭和</xsl:if>
              <xsl:if test="事業の開始年月日[1]/年号[1]/text()[1][. = '平成']">平成</xsl:if>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 0); left:689px; top:930px; width:25px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:689px; top:930px; width:25px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 1px;</xsl:attribute>
              <xsl:if test="賃金支払関係[1]/賃金支払日当翌[1]/text()[1][. = '']">
                <xsl:call-template name="adam-nbsp" />
              </xsl:if>
              <xsl:if test="賃金支払関係[1]/賃金支払日当翌[1]/text()[1][. = '当月']">当月</xsl:if>
              <xsl:if test="賃金支払関係[1]/賃金支払日当翌[1]/text()[1][. = '翌月']">翌月</xsl:if>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:27px solid rgb(255, 255, 0); left:48px; top:596px; width:36px; height:27px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:48px; top:596px; width:36px; height:27px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:6px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(労働保険番号[1]/府県[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:27px solid rgb(255, 255, 0); left:91px; top:596px; width:19px; height:27px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:91px; top:596px; width:19px; height:27px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:6px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(労働保険番号[1]/所掌[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:27px solid rgb(255, 255, 0); left:116px; top:596px; width:40px; height:27px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:116px; top:596px; width:40px; height:27px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:6px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(労働保険番号[1]/管轄[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:27px solid rgb(255, 255, 0); left:174px; top:596px; width:104px; height:27px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:174px; top:596px; width:104px; height:27px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:6px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(労働保険番号[1]/基幹番号[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:27px solid rgb(255, 255, 0); left:301px; top:596px; width:58px; height:27px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:301px; top:596px; width:58px; height:27px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:6px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(労働保険番号[1]/枝番号[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:586px; top:1px; width:196px; height:13px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>G00002-A-250056-001_1</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:616px; top:1106px; width:138px; height:21px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(Xmit[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:521px; top:117px; width:26px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:521px; top:117px; width:27px; height:15px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 1px;</xsl:attribute>平成</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:22px solid rgb(255, 255, 255); left:26px; top:220px; width:420px; height:22px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:26px; top:220px; width:420px; height:22px; text-align:left; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; padding:4px 0px 0px 1px;</xsl:attribute>
              <xsl:call-template name="adam-nbsp" />●下記の５～１０欄については、変更がある事項のみ記載してください。</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:640px; top:163px; width:21px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:640px; top:163px; width:21px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>元号</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:27px solid rgb(255, 255, 255); left:627px; top:173px; width:9px; height:27px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:627px; top:173px; width:9px; height:27px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:15px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:21px solid rgb(255, 255, 255); left:630px; top:175px; width:2px; height:21px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:630px; top:175px; width:2px; height:21px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:7px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:637px; top:175px; width:10px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:637px; top:175px; width:10px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>3:</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:637px; top:185px; width:10px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:637px; top:185px; width:10px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>4:</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:648px; top:175px; width:17px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:648px; top:175px; width:17px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>昭和</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:648px; top:185px; width:17px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:648px; top:185px; width:17px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>平成</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:8px solid rgb(255, 255, 255); left:28px; top:598px; width:8px; height:8px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:28px; top:598px; width:8px; height:8px; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; writing-mode:tb-rl;</xsl:attribute>働</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:28px; top:607px; width:8px; height:9px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:28px; top:607px; width:8px; height:9px; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; writing-mode:tb-rl;</xsl:attribute>保</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:8px solid rgb(255, 255, 255); left:28px; top:616px; width:8px; height:8px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:28px; top:616px; width:8px; height:8px; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; writing-mode:tb-rl;</xsl:attribute>険</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:8px solid rgb(255, 255, 255); left:35px; top:589px; width:8px; height:8px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:35px; top:589px; width:8px; height:8px; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; writing-mode:tb-rl;</xsl:attribute>番</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:8px solid rgb(255, 255, 255); left:35px; top:616px; width:8px; height:8px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:35px; top:616px; width:8px; height:8px; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; writing-mode:tb-rl;</xsl:attribute>号</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:28px; top:662px; width:15px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:28px; top:662px; width:15px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>変</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:28px; top:712px; width:15px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:28px; top:712px; width:15px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>更</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:28px; top:762px; width:15px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:28px; top:762px; width:15px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>事</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:28px; top:811px; width:15px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:28px; top:811px; width:15px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>項</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:45px; top:762px; width:15px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:45px; top:762px; width:15px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>業</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:45px; top:807px; width:15px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:45px; top:807px; width:15px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>主</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:45px; top:716px; width:15px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:45px; top:716px; width:15px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>事</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:427px; top:960px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:427px; top:960px; width:12px; height:11px; text-align:center; font-size:7px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>所</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:427px; top:981px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:427px; top:981px; width:12px; height:11px; text-align:center; font-size:7px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>長</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:484px; top:960px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:484px; top:960px; width:12px; height:11px; text-align:center; font-size:7px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>次</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:541px; top:960px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:541px; top:960px; width:12px; height:11px; text-align:center; font-size:7px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>課</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:598px; top:960px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:598px; top:960px; width:12px; height:11px; text-align:center; font-size:7px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>係</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:655px; top:971px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:655px; top:971px; width:12px; height:11px; text-align:center; font-size:7px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>係</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:712px; top:958px; width:12px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:712px; top:958px; width:12px; height:12px; text-align:center; font-size:7px; font-family:'ＭＳ ゴシック', sans-serif; padding:2px 0px 0px 0px;</xsl:attribute>操</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:712px; top:970px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:712px; top:970px; width:12px; height:11px; text-align:center; font-size:7px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>作</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:712px; top:981px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:712px; top:981px; width:12px; height:11px; text-align:center; font-size:7px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>者</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:484px; top:981px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:484px; top:981px; width:12px; height:11px; text-align:center; font-size:7px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>長</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:541px; top:981px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:541px; top:981px; width:12px; height:11px; text-align:center; font-size:7px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>長</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:598px; top:981px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:598px; top:981px; width:12px; height:11px; text-align:center; font-size:7px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px;</xsl:attribute>長</xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:754px; top:117px; width:25px; height:12px; text-align:left; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 1px; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(変更年月日[1]/年号[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </PRE>
  </xsl:template>
  <xsl:template match="G00002-A-250056-001_2">
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 255); left:456px; top:835px; width:22px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:456px; top:835px; width:22px; height:14px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:2px 0px 0px 0px;</xsl:attribute>平成</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:542px; top:837px; width:10px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:542px; top:837px; width:10px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>月</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:576px; top:837px; width:10px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:576px; top:837px; width:10px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>日</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:507px; top:798px; width:11px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:507px; top:798px; width:11px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>年</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:542px; top:798px; width:10px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:542px; top:798px; width:10px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>月</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:576px; top:798px; width:10px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:576px; top:798px; width:10px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>日</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:27px solid rgb(255, 255, 255); left:669px; top:173px; width:9px; height:27px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:669px; top:173px; width:9px; height:27px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:15px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:21px solid rgb(255, 255, 255); left:672px; top:175px; width:3px; height:21px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:672px; top:175px; width:3px; height:21px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:7px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 255); left:598px; top:595px; width:8px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:598px; top:595px; width:8px; height:25px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:11px 0px 0px 0px;</xsl:attribute>]</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 255); left:640px; top:595px; width:8px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:640px; top:595px; width:8px; height:25px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:11px 0px 0px 0px;</xsl:attribute>[</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:25px solid rgb(255, 255, 255); left:681px; top:595px; width:9px; height:25px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:681px; top:595px; width:9px; height:25px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:11px 0px 0px 0px;</xsl:attribute>]</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:19px solid rgb(255, 255, 255); left:122px; top:826px; width:7px; height:19px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:122px; top:826px; width:7px; height:19px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;</xsl:attribute>]</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:19px solid rgb(255, 255, 255); left:61px; top:689px; width:7px; height:19px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:61px; top:689px; width:7px; height:19px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;</xsl:attribute>[</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:19px solid rgb(255, 255, 255); left:126px; top:689px; width:7px; height:19px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:126px; top:689px; width:7px; height:19px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;</xsl:attribute>]</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:40px solid rgb(255, 255, 255); left:337px; top:2027px; width:92px; height:40px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:337px; top:2027px; width:92px; height:40px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:22px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:40px solid rgb(255, 255, 255); left:211px; top:2027px; width:127px; height:40px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:211px; top:2027px; width:127px; height:40px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:22px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:211px; top:2015px; width:127px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:211px; top:2015px; width:127px; height:13px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:40px solid rgb(255, 255, 255); left:76px; top:2027px; width:136px; height:40px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:76px; top:2027px; width:136px; height:40px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:22px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:36px solid rgb(255, 255, 0); left:518px; top:2013px; width:236px; height:36px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:518px; top:2013px; width:236px; height:36px; text-align:left; font-size:35px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:8px; height:8px; line-height:1em; vertical-align:bottom;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(労働保険事務組合記載欄[1]/所在地[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:16px solid rgb(255, 255, 255); left:731px; top:2118px; width:17px; height:16px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:731px; top:2118px; width:17px; height:16px; text-align:center; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;</xsl:attribute>印</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:36px solid rgb(255, 255, 0); left:518px; top:2058px; width:236px; height:36px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:518px; top:2058px; width:236px; height:36px; text-align:left; font-size:35px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:8px; height:8px; line-height:1em; vertical-align:bottom;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(労働保険事務組合記載欄[1]/名称[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:29px solid rgb(255, 255, 0); left:339px; top:1908px; width:353px; height:29px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:339px; top:1908px; width:353px; height:29px; text-align:left; font-size:28px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:10px; height:10px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(事業主[1]/名称[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:30px solid rgb(255, 255, 0); left:339px; top:1874px; width:353px; height:30px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:339px; top:1874px; width:353px; height:30px; text-align:left; font-size:29px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:10px; height:10px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(事業主[1]/住所[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:304px; top:1884px; width:24px; height:11px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:304px; top:1884px; width:24px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>住所</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:21px solid rgb(255, 255, 255); left:604px; top:1606px; width:42px; height:21px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:604px; top:1606px; width:42px; height:21px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:18px solid rgb(255, 255, 255); left:604px; top:1589px; width:140px; height:18px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:604px; top:1589px; width:140px; height:18px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;</xsl:attribute>改印欄(事業所・事業主)</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:21px solid rgb(255, 255, 255); left:506px; top:1606px; width:99px; height:21px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:506px; top:1606px; width:99px; height:21px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:121px solid rgb(255, 255, 255); left:462px; top:1626px; width:143px; height:121px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:462px; top:1626px; width:143px; height:121px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:103px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:121px solid rgb(255, 255, 255); left:604px; top:1626px; width:140px; height:121px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:604px; top:1626px; width:140px; height:121px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:103px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:21px solid rgb(255, 255, 255); left:462px; top:1606px; width:45px; height:21px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:462px; top:1606px; width:45px; height:21px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:21px solid rgb(255, 255, 255); left:320px; top:1606px; width:38px; height:21px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:320px; top:1606px; width:38px; height:21px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:21px solid rgb(255, 255, 255); left:357px; top:1606px; width:106px; height:21px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:357px; top:1606px; width:106px; height:21px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:18px solid rgb(255, 255, 255); left:320px; top:1589px; width:143px; height:18px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:320px; top:1589px; width:143px; height:18px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;</xsl:attribute>改印欄(事業所・事業主)</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:18px solid rgb(255, 255, 255); left:462px; top:1589px; width:143px; height:18px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:462px; top:1589px; width:143px; height:18px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;</xsl:attribute>改印欄(事業所・事業主)</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:142px solid rgb(255, 255, 255); left:196px; top:1606px; width:125px; height:142px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:196px; top:1606px; width:125px; height:142px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:124px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:18px solid rgb(255, 255, 255); left:196px; top:1589px; width:125px; height:18px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:196px; top:1589px; width:125px; height:18px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:2px 7px 0px 7px;</xsl:attribute>事業主(代理人)印影</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:18px solid rgb(255, 255, 255); left:63px; top:1589px; width:134px; height:18px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:63px; top:1589px; width:134px; height:18px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:141px solid rgb(255, 255, 255); left:63px; top:1606px; width:134px; height:141px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:63px; top:1606px; width:134px; height:141px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:123px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:158px solid rgb(255, 255, 255); left:35px; top:1589px; width:29px; height:158px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:35px; top:1589px; width:29px; height:158px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:140px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:121px solid rgb(255, 255, 255); left:320px; top:1626px; width:143px; height:121px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:320px; top:1626px; width:143px; height:121px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:103px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:19px solid rgb(255, 255, 255); left:35px; top:1746px; width:428px; height:19px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:35px; top:1746px; width:428px; height:19px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:58px solid rgb(255, 255, 255); left:35px; top:1764px; width:428px; height:58px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:35px; top:1764px; width:428px; height:58px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:40px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:120px solid rgb(255, 255, 0); left:30px; top:2080px; width:280px; height:120px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:30px; top:2080px; width:280px; height:120px; text-align:left; font-size:119px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:10px; height:10px; line-height:1em; vertical-align:top;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(社会保険労務士記載欄[1]/付記欄[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:5px; top:2031px; width:22px; height:12px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(社会保険労務士記載欄[1]/作成年月日[1]/年号[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 255); left:67px; top:1780px; width:13px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:67px; top:1780px; width:13px; height:14px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>※</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:16px solid rgb(255, 255, 255); left:93px; top:1779px; width:297px; height:16px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:1779px; width:297px; height:16px; text-align:center; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>最寄りの駅又はバス停から事業所への道順略図を</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:16px solid rgb(255, 255, 255); left:91px; top:1799px; width:217px; height:16px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:91px; top:1799px; width:217px; height:16px; text-align:center; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>添付資料として提出してください。</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 255); left:42px; top:1749px; width:14px; height:14px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:42px; top:1749px; width:14px; height:14px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>27</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:62px; top:1751px; width:232px; height:13px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:62px; top:1751px; width:232px; height:13px; text-align:center; font-size:11px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>最寄りの駅又はバス停から事業所への道順</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:15px solid rgb(255, 255, 255); left:44px; top:1612px; width:15px; height:15px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:44px; top:1612px; width:15px; height:15px; text-align:center; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>26</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:15px solid rgb(255, 255, 255); left:42px; top:1639px; width:15px; height:15px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:42px; top:1639px; width:15px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif; writing-mode:tb-rl;</xsl:attribute>登</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 255); left:85px; top:1591px; width:84px; height:14px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:85px; top:1591px; width:84px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>事業所印影</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:328px; top:1608px; width:25px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:328px; top:1608px; width:25px; height:9px; text-align:center; font-size:7px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>改印</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:8px solid rgb(255, 255, 255); left:328px; top:1617px; width:25px; height:8px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:328px; top:1617px; width:25px; height:8px; text-align:center; font-size:7px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>年月日</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:8px solid rgb(255, 255, 255); left:360px; top:1608px; width:19px; height:8px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:360px; top:1608px; width:19px; height:8px; text-align:center; font-size:7px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>平成</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:472px; top:1608px; width:24px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:472px; top:1608px; width:24px; height:9px; text-align:center; font-size:7px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>改印</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:8px solid rgb(255, 255, 255); left:472px; top:1617px; width:24px; height:8px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:472px; top:1617px; width:24px; height:8px; text-align:center; font-size:7px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>年月日</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:8px solid rgb(255, 255, 255); left:612px; top:1608px; width:25px; height:8px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:612px; top:1608px; width:25px; height:8px; text-align:center; font-size:7px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>改印</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:8px solid rgb(255, 255, 255); left:612px; top:1617px; width:26px; height:8px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:612px; top:1617px; width:26px; height:8px; text-align:center; font-size:7px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>年月日</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 255); left:32px; top:1841px; width:288px; height:14px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:32px; top:1841px; width:288px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>上記のとおり届出事項に変更があったので届けます。</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(255, 255, 255); left:76px; top:1857px; width:1px; height:1px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:76px; top:1857px; width:1px; height:1px; font-size:1px; font-family:'ＭＳ 明朝', serif; writing-mode:tb-rl;</xsl:attribute>.</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(255, 255, 255); left:311px; top:1856px; width:1px; height:1px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:311px; top:1856px; width:1px; height:1px; font-size:1px; font-family:'ＭＳ 明朝', serif; writing-mode:tb-rl;</xsl:attribute>.</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:735px; top:1853px; width:28px; height:10px; text-align:left; font-size:8px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(届出年月日[1]/年号[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:479px; top:1854px; width:15px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:479px; top:1854px; width:15px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>年</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(255, 255, 255); left:521px; top:1868px; width:0px; height:1px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:521px; top:1868px; width:0px; height:1px; text-align:center; font-size:1px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>■</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 255); left:165px; top:1874px; width:99px; height:14px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:165px; top:1874px; width:99px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>公共職業安定所長</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:0px solid rgb(255, 255, 255); left:198px; top:1892px; width:2px; height:0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:198px; top:1892px; width:2px; height:0px; font-size:1px; font-family:'ＭＳ 明朝', serif; writing-mode:tb-rl;</xsl:attribute>.</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:0px solid rgb(255, 255, 255); left:204px; top:1892px; width:2px; height:0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:204px; top:1892px; width:2px; height:0px; font-size:1px; font-family:'ＭＳ 明朝', serif; writing-mode:tb-rl;</xsl:attribute>.</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:268px; top:1874px; width:12px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:268px; top:1874px; width:12px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>殿</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:255px; top:1916px; width:37px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:255px; top:1916px; width:37px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>事業主</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:304px; top:1916px; width:24px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:304px; top:1916px; width:24px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>名称</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:305px; top:1948px; width:24px; height:11px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:305px; top:1948px; width:24px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>氏名</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:8px solid rgb(255, 255, 255); left:702px; top:1942px; width:69px; height:8px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:702px; top:1942px; width:69px; height:8px; text-align:center; font-size:7px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>記名押印又は署名</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:480px; top:1984px; width:9px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:480px; top:1984px; width:9px; height:12px; font-size:6px; font-family:'ＭＳ 明朝', serif; writing-mode:tb-rl;</xsl:attribute>印</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 255); left:481px; top:1981px; width:129px; height:14px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:481px; top:1981px; width:129px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>労働保険事務組合記載欄</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:481px; top:2036px; width:34px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:481px; top:2036px; width:34px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>所在地</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:482px; top:2082px; width:33px; height:11px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:482px; top:2082px; width:33px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>名称</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:481px; top:2122px; width:59px; height:11px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:481px; top:2122px; width:59px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>代表者氏名</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:483px; top:2164px; width:53px; height:11px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:483px; top:2164px; width:53px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>委託開始</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:625px; top:2162px; width:12px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:625px; top:2162px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>年</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:681px; top:2162px; width:12px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:681px; top:2162px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>月</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:731px; top:2162px; width:11px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:731px; top:2162px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>日</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(255, 255, 255); left:529px; top:2177px; width:1px; height:1px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:529px; top:2177px; width:1px; height:1px; text-align:center; font-size:1px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>■</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:761px; top:2199px; width:22px; height:13px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(労働保険事務組合記載欄[1]/委託解除年月日[1]/年号[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); left:480px; top:2049px; width:274px; line-height:0px; height:0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); left:480px; top:2135px; width:274px; line-height:0px; height:0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); left:480px; top:2177px; width:274px; line-height:0px; height:0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); left:480px; top:2215px; width:275px; line-height:0px; height:0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:8px solid rgb(255, 255, 255); left:510px; top:1608px; width:18px; height:8px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:510px; top:1608px; width:18px; height:8px; text-align:center; font-size:7px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>平成</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:21px solid rgb(255, 255, 255); left:645px; top:1606px; width:99px; height:21px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:645px; top:1606px; width:99px; height:21px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:8px solid rgb(255, 255, 255); left:648px; top:1608px; width:18px; height:8px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:648px; top:1608px; width:18px; height:8px; text-align:center; font-size:7px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>平成</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:393px; top:1611px; width:11px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:393px; top:1611px; width:11px; height:11px; text-align:left; font-size:8px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>年</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:419px; top:1611px; width:10px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:419px; top:1611px; width:10px; height:11px; text-align:left; font-size:8px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>月</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:445px; top:1611px; width:10px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:445px; top:1611px; width:10px; height:11px; text-align:left; font-size:8px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>日</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:541px; top:1610px; width:11px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:541px; top:1610px; width:11px; height:11px; text-align:left; font-size:8px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>年</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:567px; top:1610px; width:10px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:567px; top:1610px; width:10px; height:11px; text-align:left; font-size:8px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>月</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:590px; top:1610px; width:11px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:590px; top:1610px; width:11px; height:11px; text-align:left; font-size:8px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>日</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:681px; top:1610px; width:10px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:681px; top:1610px; width:10px; height:11px; text-align:left; font-size:8px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>年</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:707px; top:1610px; width:10px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:707px; top:1610px; width:10px; height:11px; text-align:left; font-size:8px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>月</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:731px; top:1610px; width:11px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:731px; top:1610px; width:11px; height:11px; text-align:left; font-size:8px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>日</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:16px solid rgb(255, 255, 0); left:32px; top:1873px; width:128px; height:16px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:32px; top:1873px; width:128px; height:16px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(あて先[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:15px solid rgb(255, 255, 0); left:455px; top:1852px; width:15px; height:15px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:455px; top:1852px; width:15px; height:15px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(届出年月日[1]/年[1]/text()[1], '0'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:19px solid rgb(255, 255, 0); left:339px; top:1944px; width:353px; height:19px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:339px; top:1944px; width:353px; height:19px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(事業主[1]/氏名[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 0); left:78px; top:2049px; width:131px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:78px; top:2049px; width:131px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(社会保険労務士記載欄[1]/提出代行者事務代理者の表示[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 0); left:100px; top:2030px; width:21px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:100px; top:2030px; width:21px; height:14px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(社会保険労務士記載欄[1]/作成年月日[1]/年[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 0); left:137px; top:2030px; width:21px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:137px; top:2030px; width:21px; height:14px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(社会保険労務士記載欄[1]/作成年月日[1]/月[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 0); left:175px; top:2030px; width:21px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:175px; top:2030px; width:21px; height:14px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(社会保険労務士記載欄[1]/作成年月日[1]/日[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:483px; top:2202px; width:53px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:483px; top:2202px; width:53px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>委託解除</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:625px; top:2201px; width:12px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:625px; top:2201px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>年</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:681px; top:2201px; width:12px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:681px; top:2201px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>月</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:731px; top:2201px; width:11px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:731px; top:2201px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>日</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); left:480px; top:2095px; width:274px; line-height:0px; height:0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:26px solid rgb(255, 255, 0); left:544px; top:2108px; width:179px; height:26px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:544px; top:2108px; width:179px; height:26px; text-align:left; font-size:25px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:10px; height:10px; line-height:1em; vertical-align:bottom;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(労働保険事務組合記載欄[1]/代表者氏名[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 0); left:594px; top:2161px; width:22px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:594px; top:2161px; width:22px; height:14px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(労働保険事務組合記載欄[1]/委託開始年月日[1]/年[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 0); left:340px; top:2031px; width:35px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:340px; top:2031px; width:35px; height:13px; text-align:center; font-size:11px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(社会保険労務士記載欄[1]/電話番号[1]/市外局番[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 0); left:340px; top:2050px; width:35px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:340px; top:2050px; width:35px; height:13px; text-align:center; font-size:11px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(社会保険労務士記載欄[1]/電話番号[1]/市内局番[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 0); left:390px; top:2050px; width:34px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:390px; top:2050px; width:34px; height:13px; text-align:center; font-size:11px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(社会保険労務士記載欄[1]/電話番号[1]/加入者番号[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:15px solid rgb(255, 255, 0); left:501px; top:1852px; width:15px; height:15px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:501px; top:1852px; width:15px; height:15px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(届出年月日[1]/月[1]/text()[1], '0'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:15px solid rgb(255, 255, 0); left:550px; top:1852px; width:15px; height:15px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:550px; top:1852px; width:15px; height:15px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(届出年月日[1]/日[1]/text()[1], '0'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 0); left:594px; top:2199px; width:22px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:594px; top:2199px; width:22px; height:14px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(労働保険事務組合記載欄[1]/委託解除年月日[1]/年[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 0); left:649px; top:2161px; width:22px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:649px; top:2161px; width:22px; height:14px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(労働保険事務組合記載欄[1]/委託開始年月日[1]/月[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 0); left:702px; top:2161px; width:23px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:702px; top:2161px; width:23px; height:14px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(労働保険事務組合記載欄[1]/委託開始年月日[1]/日[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 0); left:649px; top:2199px; width:22px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:649px; top:2199px; width:22px; height:14px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(労働保険事務組合記載欄[1]/委託解除年月日[1]/月[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 0); left:702px; top:2199px; width:23px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:702px; top:2199px; width:23px; height:14px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(format-number(労働保険事務組合記載欄[1]/委託解除年月日[1]/日[1]/text()[1], '0', 'tri-min'), ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:35px solid rgb(255, 255, 0); left:216px; top:2030px; width:103px; height:35px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:216px; top:2030px; width:103px; height:35px; text-align:left; font-size:34px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">font-size:8px; height:8px; line-height:1em; vertical-align:middle;</xsl:attribute>
                <xsl:choose>
                  <xsl:when test="1">
                    <xsl:call-template name="adam-ins-br">
                      <xsl:with-param name="value" select="translate(社会保険労務士記載欄[1]/氏名[1]/text()[1], ' ','&#160;')" />
                    </xsl:call-template>
                  </xsl:when>
                </xsl:choose>
              </xsl:element>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:14px solid rgb(255, 255, 0); left:548px; top:2161px; width:30px; height:14px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left:548px; top:2161px; width:30px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>
              <xsl:if test="労働保険事務組合記載欄[1]/委託開始年月日[1]/年号[1]/text()[1][. = '']">
                <xsl:call-template name="adam-nbsp" />
              </xsl:if>
              <xsl:if test="労働保険事務組合記載欄[1]/委託開始年月日[1]/年号[1]/text()[1][. = '昭和']">昭和</xsl:if>
              <xsl:if test="労働保険事務組合記載欄[1]/委託開始年月日[1]/年号[1]/text()[1][. = '平成']">平成</xsl:if>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:632px; top:1104px; width:158px; height:20px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;</xsl:attribute>G00002-A-250056-001_2</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:716px; top:2231px; width:52px; height:24px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:6px 0px 0px 0px;</xsl:attribute>
              <xsl:choose>
                <xsl:when test="1">
                  <xsl:call-template name="adam-ins-br">
                    <xsl:with-param name="value" select="translate(Xmit[1]/text()[1], ' ','&#160;')" />
                  </xsl:call-template>
                </xsl:when>
              </xsl:choose>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:52px solid rgb(255, 255, 255); left:30px; top:2015px; width:47px; height:52px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:30px; top:2015px; width:47px; height:52px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:34px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:76px; top:2015px; width:136px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:76px; top:2015px; width:136px; height:13px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:337px; top:2015px; width:92px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:337px; top:2015px; width:92px; height:13px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:346px; top:2017px; width:75px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:346px; top:2017px; width:75px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>電話番号</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:34px; top:2021px; width:40px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:34px; top:2021px; width:40px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>社会保険</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:34px; top:2035px; width:40px; height:12px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:34px; top:2035px; width:40px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>労務士</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:33px; top:2049px; width:40px; height:11px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:33px; top:2049px; width:40px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>記載欄</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:78px; top:2017px; width:129px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:78px; top:2017px; width:129px; height:9px; text-align:center; font-size:5px; font-family:'ＭＳ ゴシック', sans-serif; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>作成年月日・提出代行者・事務代理者の表示</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:323px; top:2047px; width:12px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:2047px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>印</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:9px solid rgb(255, 255, 255); left:239px; top:2017px; width:79px; height:9px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:239px; top:2017px; width:79px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>氏　名</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:124px; top:2031px; width:12px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:124px; top:2031px; width:12px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>年</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:164px; top:2031px; width:11px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:164px; top:2031px; width:11px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>月</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:198px; top:2031px; width:11px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:198px; top:2031px; width:11px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>日</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:376px; top:2031px; width:13px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:376px; top:2031px; width:13px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>―</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:376px; top:2050px; width:13px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:376px; top:2050px; width:13px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>―</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:15px solid rgb(255, 255, 255); left:727px; top:1951px; width:17px; height:15px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:727px; top:1951px; width:17px; height:15px; text-align:center; font-size:8px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;</xsl:attribute>印</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:15px solid rgb(255, 255, 255); left:42px; top:1666px; width:15px; height:15px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:42px; top:1666px; width:15px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif; writing-mode:tb-rl;</xsl:attribute>録</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:15px solid rgb(255, 255, 255); left:42px; top:1693px; width:15px; height:15px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:42px; top:1693px; width:15px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif; writing-mode:tb-rl;</xsl:attribute>印</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:10px solid rgb(255, 255, 255); left:419px; top:1853px; width:28px; height:10px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:419px; top:1853px; width:28px; height:10px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>平<xsl:call-template name="adam-nbsp" />成</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:525px; top:1854px; width:15px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:525px; top:1854px; width:15px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>月</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:11px solid rgb(255, 255, 255); left:574px; top:1854px; width:15px; height:11px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:574px; top:1854px; width:15px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>日</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:13px solid rgb(255, 255, 255); left:559px; top:2199px; width:22px; height:13px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:559px; top:2199px; width:22px; height:13px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>平成</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:12px solid rgb(255, 255, 255); left:78px; top:2031px; width:21px; height:12px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:78px; top:2031px; width:21px; height:12px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif;</xsl:attribute>平成</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:371px solid rgb(255, 255, 255); left:38px; top:1104px; width:744px; height:371px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:38px; top:1104px; width:744px; height:371px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:353px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:15px solid rgb(255, 255, 255); left:43px; top:1108px; width:50px; height:15px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:43px; top:1108px; width:50px; height:15px; text-align:left; font-size:13px; font-family:'ＭＳ 明朝', serif;</xsl:attribute>注　意</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:43px; top:1127px; width:23px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:43px; top:1127px; width:23px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>１</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:66px; top:1127px; width:705px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:66px; top:1127px; width:705px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>記載すべき事項のない欄又は記入枠は空欄のままとし、※印のついた欄又は記入枠には記載しないでください。</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:43px; top:1146px; width:23px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:43px; top:1146px; width:23px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>２</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:66px; top:1146px; width:705px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:66px; top:1146px; width:705px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>2欄の記載は、年、月又は日が１桁の場合は、それぞれ10の位の部分に「０」を付加して２桁で記載してください。</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:18px solid rgb(255, 255, 255); left:43px; top:1165px; width:23px; height:18px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:43px; top:1165px; width:23px; height:18px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;</xsl:attribute>３</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:18px solid rgb(255, 255, 255); left:43px; top:1203px; width:23px; height:18px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:43px; top:1203px; width:23px; height:18px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;</xsl:attribute>４</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:18px solid rgb(255, 255, 255); left:66px; top:1165px; width:705px; height:18px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:66px; top:1165px; width:705px; height:18px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;</xsl:attribute>3欄の記載は、公共職業安定所から通知された事業所番号が連続した10桁の構成である場合は、</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:18px solid rgb(255, 255, 255); left:66px; top:1184px; width:705px; height:18px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:66px; top:1184px; width:705px; height:18px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;</xsl:attribute>管轄の公共職業安定所にご連絡ください。</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:43px; top:1242px; width:23px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:43px; top:1242px; width:23px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>５</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:18px solid rgb(255, 255, 255); left:66px; top:1203px; width:705px; height:18px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:66px; top:1203px; width:705px; height:18px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;</xsl:attribute>4欄には、雇用保険の適用事業となるに至った年月日を記載してください。記載方法は、元号を選択した上で、</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:66px; top:1223px; width:705px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:66px; top:1223px; width:705px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>年、月又は日が１桁の場合は、それぞれ10の位の部分に「０」を付加して２桁で記載してください。</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:43px; top:1280px; width:23px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:43px; top:1280px; width:23px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>６</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:66px; top:1242px; width:705px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:66px; top:1242px; width:705px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>5欄には、数字は使用せず、カタカナ及び「－」のみで記載してください。</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:66px; top:1261px; width:705px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:66px; top:1261px; width:705px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>カタカナの「ヰ」、「ヱ」及び「ヲ」は使用せず、それぞれ「イ」、「エ」及び「オ」を使用してください。</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:43px; top:1299px; width:23px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:43px; top:1299px; width:23px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>７</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:66px; top:1280px; width:705px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:66px; top:1280px; width:705px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>6欄及び8欄には、漢字、カタカナ、平仮名及び英数字（英字については大文字体とする。）により記載してください。</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:66px; top:1299px; width:705px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:66px; top:1299px; width:705px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>8欄には、都道府県名は記載せず、特別区名、市名又は郡名とそれに続く町村名、丁目及び番地のみを左詰めで記載し</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:43px; top:1337px; width:23px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:43px; top:1337px; width:23px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>８</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:66px; top:1318px; width:705px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:66px; top:1318px; width:705px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>てください。また、所在地にビル名又はマンション名等が入る場合は続けて記載してください。</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:62px solid rgb(255, 255, 255); left:38px; top:1493px; width:744px; height:62px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:38px; top:1493px; width:744px; height:62px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:44px 0px 0px 0px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:15px solid rgb(255, 255, 255); left:43px; top:1497px; width:46px; height:15px;</xsl:attribute>
            </xsl:element>
            <PRE>
              <xsl:element name="SPAN">
                <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:43px; top:1497px; width:46px; height:15px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines;</xsl:attribute>お願い</xsl:element>
            </PRE>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:55px; top:1516px; width:23px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:55px; top:1516px; width:23px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>１</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:78px; top:1516px; width:685px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:78px; top:1516px; width:685px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>変更のあった日の翌日から起算して10日以内に提出してください。</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:43px; top:1356px; width:23px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:43px; top:1356px; width:23px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>９</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:66px; top:1337px; width:705px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:66px; top:1337px; width:705px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>9欄には、事業所の電話番号を記載してください。</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:66px; top:1356px; width:705px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:66px; top:1356px; width:705px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>27欄は、最寄りの駅又はバス停から事業所への道順略図を添付資料として提出してください。</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:55px; top:1535px; width:23px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:55px; top:1535px; width:23px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>２</xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:17px solid rgb(255, 255, 255); left:78px; top:1535px; width:685px; height:17px;</xsl:attribute>
            </xsl:element>
            <xsl:element name="SPAN">
              <xsl:attribute name="style">position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:78px; top:1535px; width:685px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;</xsl:attribute>営業許可証、登記事項証明書その他の記載内容を確認することができる書類を添付資料として提出してください。</xsl:element>
  </xsl:template>
  <xsl:template name="adam-nbsp">
    <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
  </xsl:template>
  <xsl:template name="adam-br">
    <xsl:text disable-output-escaping="yes">&lt;BR /&gt;</xsl:text>
  </xsl:template>
  <xsl:template name="adam-ins-br">
    <xsl:param name="value" />
    <xsl:choose>
      <xsl:when test="contains($value,'&#xA;')">
        <xsl:value-of select="normalize-space(substring-before($value,'&#xA;'))" />
        <BR />
        <xsl:call-template name="adam-ins-br">
          <xsl:with-param name="value" select="substring-after($value,'&#xA;')" />
        </xsl:call-template>
      </xsl:when>
      <xsl:otherwise>
        <xsl:value-of select="$value" />
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
  <xsl:template match="/DataRoot/様式ID" />
  <xsl:template match="/DataRoot/様式バージョン" />
  <xsl:template match="/DataRoot/STYLESHEET" />
  <xsl:template match="/DataRoot/様式コピー情報" />
  <xsl:template match="/DataRoot/Doctype" />
</xsl:stylesheet>
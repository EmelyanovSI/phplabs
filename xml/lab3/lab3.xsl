<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html"/>

    <xsl:variable name="weightVar" select="16"/>
    <xsl:variable name="priceVar" select="60"/>

    <xsl:template name="tableHeader">
        <xsl:param name="thead">
            <thead>

            </thead>
        </xsl:param>
        <xsl:copy-of select="$thead"/>
    </xsl:template>

    <xsl:template name="tr">
            <tr>
                <th>modelName</th>
                <th class="image">image</th>
                <th>weight</th>
                <th class="size">size</th>
                <th>price</th>
                <th class="color">color</th>
                <th>description</th>
            </tr>
    </xsl:template>

    <xsl:template match="/">
        <xsl:copy>
            <html>
                <head>
                    <title>xmlab3</title>
                    <meta charset="UTF-8"/>
                    <link rel="stylesheet" href="lab3.css"/>
                </head>
                <body class="shoeShop">
                    <p class="date">
                        <xsl:value-of select="shoeShop/date"/>
                    </p>
                    <xsl:for-each select="shoeShop/brand">
                        <div class="brand">
                            <xsl:for-each select="season">
                                <div class="season">
                                    <xsl:for-each select="gender">
                                        <table class="gender">

                                            <!--<xsl:call-template name="tableHeader"/>-->

                                            <xsl:call-template name="tableHeader">
                                                <xsl:with-param name="thead">
                                                    <xsl:call-template name="tr"/>
                                                </xsl:with-param>
                                            </xsl:call-template>

                                            <xsl:for-each select="model">
                                                <tbody class="model">
                                                    <xsl:for-each select="type">
                                                        <xsl:sort select="price" order="descending"/>
                                                        <tr class="type">
                                                            <xsl:if test="weight &gt;= $weightVar">
                                                                <td class="modelName">
                                                                    <xsl:value-of select="modelName"/>
                                                                </td>
                                                                <td class="image">
                                                                    <xsl:value-of select="image"/>
                                                                </td>
                                                                <td class="weight">
                                                                    <xsl:copy-of select="weight"/>
                                                                </td>
                                                                <td class="size">
                                                                    <xsl:copy-of select="size"/>
                                                                </td>
                                                                <xsl:choose>
                                                                    <xsl:when test="price &gt; $priceVar">
                                                                        <td class="price" style="color: red;">
                                                                            <xsl:value-of select="price"/>
                                                                        </td>
                                                                    </xsl:when>
                                                                    <xsl:otherwise>
                                                                        <td class="price" style="color: green;">
                                                                            <xsl:value-of select="price"/>
                                                                        </td>
                                                                    </xsl:otherwise>
                                                                </xsl:choose>
                                                                <td class="color">
                                                                    <xsl:value-of select="color"/>
                                                                </td>
                                                                <td class="description">
                                                                    <xsl:value-of select="description"/>
                                                                </td>
                                                            </xsl:if>
                                                        </tr>
                                                    </xsl:for-each>
                                                </tbody>
                                            </xsl:for-each>
                                        </table>
                                    </xsl:for-each>
                                </div>
                            </xsl:for-each>
                        </div>
                    </xsl:for-each>
                    <p class="end">
                        <xsl:value-of select="shoeShop/end"/>
                    </p>
                </body>
            </html>
        </xsl:copy>
    </xsl:template>
</xsl:stylesheet>

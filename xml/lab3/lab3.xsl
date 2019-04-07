<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
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
                                        <thead>
                                            <tr>
                                                <th>modelName</th>
                                                <th class="image">image</th>
                                                <th>weight</th>
                                                <th class="size">size</th>
                                                <th>price</th>
                                                <th class="color">color</th>
                                                <th>description</th>
                                            </tr>
                                        </thead>
                                        <xsl:for-each select="model">
                                            <tbody class="model">
                                                <xsl:for-each select="type">
                                                    <tr class="type">
                                                        <xsl:if test="weight &gt;= 16">
                                                            <td class="modelName">
                                                                <xsl:value-of select="modelName"/>
                                                            </td>
                                                            <td class="image">
                                                                <xsl:value-of select="image"/>
                                                            </td>
                                                            <td class="weight">
                                                                <xsl:value-of select="weight"/>
                                                            </td>
                                                            <td class="size">
                                                                <xsl:value-of select="size"/>
                                                            </td>
                                                            <xsl:choose>
                                                                <xsl:when test="price &gt; 60">
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
    </xsl:template>
</xsl:stylesheet>

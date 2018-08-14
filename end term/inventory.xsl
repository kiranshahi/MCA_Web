<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <body>
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Binding</th>
                        <th>Pages</th>
                        <th>Price</th>
                    </tr>
                    <xsl:for-each select="inventory/book">
                        <xsl:choose>
                            <xsl:when test="price &gt; 500">
                                <tr style="color:red">
                                    <td><xsl:value-of select="title"/></td>
                                    <td><xsl:value-of select="author"/></td>
                                    <td><xsl:value-of select="publisher"/></td>
                                    <td><xsl:value-of select="binding"/></td>
                                    <td><xsl:value-of select="page"/></td>
                                    <td><xsl:value-of select="price"/></td>
                                </tr>
                            </xsl:when>
                            <xsl:otherwise>
                                <tr style="color:lightgreen">
                                    <td><xsl:value-of select="title"/></td>
                                    <td><xsl:value-of select="author"/></td>
                                    <td><xsl:value-of select="publisher"/></td>
                                    <td><xsl:value-of select="binding"/></td>
                                    <td><xsl:value-of select="page"/></td>
                                    <td><xsl:value-of select="price"/></td>
                                </tr>
                            </xsl:otherwise>
                        </xsl:choose>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
        <head>
            <title>CV de <xsl:value-of select="cv/personalInfo/name"/></title>
            <link rel="stylesheet" type="text/css" href="css.css"/>
        </head>
        <body>
            <h1><xsl:value-of select="cv/personalInfo/name"/></h1>
            <p>Email: <xsl:value-of select="cv/personalInfo/email"/></p>
            <p>Téléphone: <xsl:value-of select="cv/personalInfo/phone"/></p>
            <div class="section">
                <h2>Résumé</h2>
                <p><xsl:value-of select="cv/summary"/></p>
            </div>
            <div class="section">
                <h2>Expérience</h2>
                <xsl:for-each select="cv/experience/job">
                    <div class="job">
                        <h3><xsl:value-of select="title"/></h3>
                        <p><xsl:value-of select="company"/></p>
                        <p><xsl:value-of select="date"/></p>
                    </div>
                </xsl:for-each>
            </div>
            <div class="section">
                <h2>Éducation</h2>
                <div class="education">
                    <p><xsl:value-of select="cv/education/degree"/> - <xsl:value-of select="cv/education/institution"/> (<xsl:value-of select="cv/education/year"/>)</p>
                </div>
            </div>
            <div class="section">
                <h2>Compétences</h2>
                <div class="skills">
                    <ul>
                        <xsl:for-each select="cv/skills/skill">
                            <li><xsl:value-of select="."/></li>
                        </xsl:for-each>
                    </ul>
                </div>
            </div>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>

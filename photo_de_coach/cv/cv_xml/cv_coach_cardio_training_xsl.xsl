<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
        <head>
            <title>CV de <xsl:value-of select="cv/personalInfo/name"/></title>
            <link rel="stylesheet" type="text/css" href="css.css"/>
        </head>
        <body>
            <div class="cv-container">
                <div class="left-column">
                    <h1><xsl:value-of select="cv/personalInfo/name"/></h1>
                    <p>Email: <xsl:value-of select="cv/personalInfo/email"/></p>
                    <p>Téléphone: <xsl:value-of select="cv/personalInfo/phone"/></p>
                    <p>Age: <xsl:value-of select="cv/personalInfo/age"/></p>
                    <img class="profile-photo" src="{cv/personalInfo/photo}" alt="Photo du CV"/>
                    <div class="section">
                        <h2>Résumé</h2>
                        <p><xsl:value-of select="cv/summary"/></p>
                    </div>
                </div>
                <div class="middle-column">
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
                        <xsl:for-each select="cv/education">
                        <div class="education">
                            <p><xsl:value-of select="degree"/> - <xsl:value-of select="institution"/> (<xsl:value-of select="year"/>)</p>
                        </div>
                        </xsl:for-each>
                    </div>
                </div>
            </div>
            <div class="section skills_hobbies_languages">
                <div class="skills">
                    <h2>Compétences</h2>
                    <ul>
                        <xsl:for-each select="cv/skills/skill">
                            <li><xsl:value-of select="."/></li>
                        </xsl:for-each>
                    </ul>
                </div>
                <div class="section languages">
                        <h2>Langues</h2>
                        <ul>
                            <xsl:for-each select="cv/languages/language">
                                <li><xsl:value-of select="."/></li>
                            </xsl:for-each>
                        </ul>
                </div>
                <div class="hobbies">
                    <h2>Hobbies</h2>
                    <ul>
                        <xsl:for-each select="cv/hobbies/hobby">
                            <li><xsl:value-of select="."/></li>
                        </xsl:for-each>
                    </ul>
                </div>
            </div>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
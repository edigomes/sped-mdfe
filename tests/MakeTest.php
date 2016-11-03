<?php

namespace Test\NFePHP\MDFe;

/**
 * Class MakeMDFeTest
 * @author Roberto L. Machado <linux.rlm at gmail dot com>
 */
use NFePHP\MDFe\Make;
use PHPUnit_Framework_TestCase;

class MakeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Make
     */
    private $makeMdfe;

    public function testOMetodoTagemitDeveGerenciarCamposOpcionais()
    {
        $domElement = $this->makeMdfe->tagemit(
            $CNPJ = '06539526000392',
            $IE = '9057800426',
            $xNome = 'CT-E EMITIDO EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL',
            $xFant = 'CT-E EMITIDO'
        );

        $expectedXml = "<emit>
            <CNPJ>$CNPJ</CNPJ>
            <IE>$IE</IE>
            <xNome>$xNome</xNome>
            <!--Optional:-->
            <xFant>$xFant</xFant>
        </emit>";
        $actualXml = $domElement->ownerDocument->saveXML($domElement);
        $this->assertXmlStringEqualsXmlString($expectedXml, $actualXml);

        $xFant = null;
        $domElement = $this->makeMdfe->tagemit($CNPJ, $IE, $xNome, $xFant);
        $actualXml = $domElement->ownerDocument->saveXML($domElement);
        $this->assertXmlStringNotEqualsXmlString($expectedXml, $actualXml);

        $expectedXml = "<emit>
            <CNPJ>$CNPJ</CNPJ>
            <IE>$IE</IE>
            <xNome>$xNome</xNome>
        </emit>";
        $this->assertXmlStringEqualsXmlString($expectedXml, $actualXml);
    }

    public function testOMetodoTagenderemitDeveGerenciarCamposOpcionais()
    {
        $domElement = $this->makeMdfe->tagenderEmit(
            $xLgr = 'ALD TITO MUFFATO',
            $nro = '290',
            $xCpl = 'SALA 04',
            $xBairro = 'JARDIM ITAMARATY',
            $cMun = '4108304',
            $xMun = 'Foz do Iguacu',
            $CEP = '85863070',
            $UF = 'PR',
            $fone = '1148869000',
            $email = 'contato@otimizy.com.br'
        );

        $expectedXml = "<enderEmit>
                <xLgr>$xLgr</xLgr>
                <nro>$nro</nro>
                <!--Optional:-->
                <xCpl>$xCpl</xCpl>
                <xBairro>$xBairro</xBairro>
                <cMun>$cMun</cMun>
                <xMun>$xMun</xMun>
                <!--Optional:-->
                <CEP>$CEP</CEP>
                <UF>$UF</UF>
                <!--Optional:-->
                <fone>$fone</fone>
                <!--Optional:-->
                <email>$email</email>
            </enderEmit>";
        $actualXml = $domElement->ownerDocument->saveXML($domElement);
        $this->assertXmlStringEqualsXmlString($expectedXml, $actualXml);

        $xCpl = null;
        $CEP = null;
        $fone = null;
        $email = null;
        $domElement = $this->makeMdfe->tagenderEmit($xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $CEP, $UF, $fone, $email);
        $actualXml = $domElement->ownerDocument->saveXML($domElement);
        $this->assertXmlStringNotEqualsXmlString($expectedXml, $actualXml);

        $expectedXml = "<enderEmit>
                <xLgr>$xLgr</xLgr>
                <nro>$nro</nro>
                <xBairro>$xBairro</xBairro>
                <cMun>$cMun</cMun>
                <xMun>$xMun</xMun>
                <UF>$UF</UF>
            </enderEmit>";
        $actualXml = $domElement->ownerDocument->saveXML($domElement);
        $this->assertXmlStringEqualsXmlString($expectedXml, $actualXml);
    }

    public function testOMetodoTagideDeveGerenciarCamposOpcionais()
    {
        $domElement = $this->makeMdfe->tagide(
            $cUF = '51',
            $tpAmb = '2',
            $tpEmit = '1',
            $tpTransp = '2',
            $mod = '58',
            $serie = '0',
            $nMDF = '1',
            $cMDF = (string)rand(),
            $cDV = '1',
            $modal = '1',
            $dhEmi = date('Y-m-d H:i:sP'),
            $tpEmis = '1',
            $procEmi = '3',
            $verProc = '1.0.0',
            $UFIni = 'SP',
            $UFFim = 'RJ',
            $dhIniViagem = date('Y-m-d H:i:sP')
        );

        $expectedXml = "<ide>
            <cUF>$cUF</cUF>
            <tpAmb>$tpAmb</tpAmb>
            <tpEmit>$tpEmit</tpEmit>
            <!--Optional:-->
            <tpTransp>$tpTransp</tpTransp>
            <mod>$mod</mod>
            <serie>$serie</serie>
            <nMDF>$nMDF</nMDF>
            <cMDF>$cMDF</cMDF>
            <cDV>$cDV</cDV>
            <modal>$modal</modal>
            <dhEmi>$dhEmi</dhEmi>
            <tpEmis>$tpEmis</tpEmis>
            <procEmi>$procEmi</procEmi>
            <verProc>$verProc</verProc>
            <UFIni>$UFIni</UFIni>
            <UFFim>$UFFim</UFFim>
            <!--Optional:-->
            <dhIniViagem>$dhIniViagem</dhIniViagem>
        </ide>";
        $actualXml = $domElement->ownerDocument->saveXML($domElement);
        $this->assertXmlStringEqualsXmlString($expectedXml, $actualXml);

        $tpTransp = null;
        $dhIniViagem = null;
        $domElement = $this->makeMdfe->tagide($cUF, $tpAmb, $tpEmit, $tpTransp, $mod, $serie, $nMDF, $cMDF, $cDV, $modal, $dhEmi, $tpEmis, $procEmi, $verProc, $UFIni, $UFFim, $dhIniViagem);
        $actualXml = $domElement->ownerDocument->saveXML($domElement);
        $this->assertXmlStringNotEqualsXmlString($expectedXml, $actualXml);

        $expectedXml = "<ide>
            <cUF>$cUF</cUF>
            <tpAmb>$tpAmb</tpAmb>
            <tpEmit>$tpEmit</tpEmit>
            <mod>$mod</mod>
            <serie>$serie</serie>
            <nMDF>$nMDF</nMDF>
            <cMDF>$cMDF</cMDF>
            <cDV>$cDV</cDV>
            <modal>$modal</modal>
            <dhEmi>$dhEmi</dhEmi>
            <tpEmis>$tpEmis</tpEmis>
            <procEmi>$procEmi</procEmi>
            <verProc>$verProc</verProc>
            <UFIni>$UFIni</UFIni>
            <UFFim>$UFFim</UFFim>
        </ide>";
        $actualXml = $domElement->ownerDocument->saveXML($domElement);
        $this->assertXmlStringEqualsXmlString($expectedXml, $actualXml);
    }

    public function testOMetodoTagInfCTeDeveGerenciarCamposOpcionais()
    {
        $domElement = $this->makeMdfe->tagInfCTe(
            $nItem = 0,
            $chCTe = '33333333333333333333333333333333333333333333',
            $segCodBarra = '123123123123123123123123123123123123',
            $indReentrega = '1'
        );

        $expectedXml = "<infCTe>
            <chCTe>$chCTe</chCTe>
            <!--Optional:-->
            <SegCodBarra>$segCodBarra</SegCodBarra>
            <!--Optional:-->
            <indReentrega>$indReentrega</indReentrega>
        </infCTe>";
        $actualXml = $domElement->ownerDocument->saveXML($domElement);
        $this->assertXmlStringEqualsXmlString($expectedXml, $actualXml);

        $segCodBarra = null;
        $indReentrega = null;
        $domElement = $this->makeMdfe->tagInfCTe(
            $nItem,
            $chCTe,
            $segCodBarra,
            $indReentrega
        );
        $actualXml = $domElement->ownerDocument->saveXML($domElement);
        $this->assertXmlStringNotEqualsXmlString($expectedXml, $actualXml);

        $expectedXml = "<infCTe>
            <chCTe>$chCTe</chCTe>
        </infCTe>";
        $actualXml = $domElement->ownerDocument->saveXML($domElement);
        $this->assertXmlStringEqualsXmlString($expectedXml, $actualXml);
    }

    protected function setUp()
    {
        parent::setUp();
        $this->makeMdfe = new Make();
    }

    protected function tearDown()
    {
        parent::tearDown();
        unset($this->makeMdfe);
    }
}

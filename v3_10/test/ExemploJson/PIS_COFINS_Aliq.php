<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'src/TNFeProc.php';

use br\ns\newssystems\nfe\struct\TNFeProc;
use br\ns\newssystems\nfe\struct\TNFe;
use br\ns\newssystems\nfe\struct\InfNFe;
use br\ns\newssystems\nfe\struct\Ide;
use br\ns\newssystems\nfe\struct\Emit;
use br\ns\newssystems\nfe\struct\TEnderEmi;
use br\ns\newssystems\nfe\struct\Dest;
use br\ns\newssystems\nfe\struct\TEndereco;
use br\ns\newssystems\nfe\struct\Det;
use br\ns\newssystems\nfe\struct\Prod;
use br\ns\newssystems\nfe\struct\Imposto;
use br\ns\newssystems\nfe\struct\ICMS;
use br\ns\newssystems\nfe\struct\ICMS90;
use br\ns\newssystems\nfe\struct\IPI;
use br\ns\newssystems\nfe\struct\IPINT;
use br\ns\newssystems\nfe\struct\PIS;
use br\ns\newssystems\nfe\struct\PISAliq;
use br\ns\newssystems\nfe\struct\COFINS;
use br\ns\newssystems\nfe\struct\COFINSAliq;
use br\ns\newssystems\nfe\struct\Total;
use br\ns\newssystems\nfe\struct\ICMSTot;
use br\ns\newssystems\nfe\struct\Transp;

$NFeProc = new TNFeProc;
$NFeProc->NFe = new TNFe;

$ide = new Ide;
$ide->cUF = 43;
$ide->cNF = "00009483";
$ide->natOp = "VENDA DE MERCADORIA ADQUIRIDA DE TERCEIRO";
$ide->indPag = 1;
$ide->mod = 55;
$ide->serie = 0;
$ide->nNF = 10340;
$ide->dhEmi = "2017-02-06T23:12:00-02:00";
$ide->tpNF = 1;
$ide->idDest = "1";
$ide->cMunFG = "4303509";
$ide->tpImp = "1";
$ide->tpEmis = "1";
$ide->cDV = "4";
$ide->tpAmb = "2";
$ide->finNFe = "1";
$ide->indFinal = "1";
$ide->indPres = "1";
$ide->procEmi = "0";
$ide->verProc = "3.10";

$emit = new Emit;
$emit->CNPJ = "07364617000135";
$emit->xNome = "NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL";
$enderEmit = new TEnderEmi;
$enderEmit->xLgr = "AV ANTONIO DURO";
$enderEmit->nro = "9";
$enderEmit->xBairro = "CENTRO";
$enderEmit->cMun = "4303509";
$enderEmit->xMun = "CAMAQUA";
$enderEmit->UF = "RS";
$enderEmit->CEP = "96180000";
$enderEmit->cPais = "1058";
$enderEmit->xPais = "BRASIL";
$emit->enderEmit = $enderEmit;
$emit->IE = "0170108708";
$emit->CRT = "3";

$dest = new Dest;
$dest->CNPJ = "07364617000135";
$dest->xNome = "NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL";
$enderDest = new TEndereco;
$enderDest->xLgr = "AV ANTONIO DURO";
$enderDest->nro = "9";
$enderDest->xBairro = "CENTRO";
$enderDest->cMun = "4303509";
$enderDest->xMun = "CAMAQUA";
$enderDest->UF = "RS";
$enderDest->CEP = "96180000";
$enderDest->cPais = "1058";
$enderDest->xPais = "BRASIL";
$dest->enderDest = $enderDest;
$dest->indIEDest = "1";
$dest->IE = "0170108708";
$dest->email = "suporte@newssystems.eti.br";


$det = new Det;
$det->nItem = 1;

$prod = new Prod;
$prod->cProd = 3058;
$prod->xProd = "LANTERNA A PILHA";
$prod->NCM = "85131010";
$prod->CEST = "1002500";
$prod->CFOP = 5405;
$prod->uCom = "UN";
$prod->qCom = 1;
$prod->vUnCom = 1700.00;
$prod->vProd = "1700.00";
$prod->uTrib = "UN";
$prod->qTrib = 1;
$prod->vUnTrib = 1700;
$prod->indTot = 1;
$prod->nItemPed = 1;
$det->prod = $prod;

$imposto = new Imposto;

$ICMS = new ICMS;
$ICMS90 = new ICMS90;
$ICMS90->orig = 0;
$ICMS90->CST = 90;
$ICMS90->modBC = 3;
$ICMS90->pRedBC = "40.00";
$ICMS90->vBC = "102.00";
$ICMS90->pICMS = "17.00";
$ICMS90->vICMS = "17.34";
$ICMS90->modBCST = 3;
$ICMS90->pMVAST = "32.00";
$ICMS90->pRedBCST = "40.00";
$ICMS90->vBCST = "326.40";
$ICMS90->pICMSST = "17.00";
$ICMS90->vICMSST = "34.14";
$ICMS->ICMS90 = $ICMS90;

$IPI = new IPI;
$IPI->cEnq = 104;
$ipint = new IPINT;
$ipint->CST = 55;
$IPI->IPINT = $ipint;

$PIS = new PIS;
$PISAliq = new PISAliq;
$PISAliq->CST = "01";
$PISAliq->vBC = "1700.00";
$PISAliq->pPIS = "1.65";
$PISAliq->vPIS = "28.05";
$PIS->PISAliq = $PISAliq;

$COFINS = new COFINS;
$COFINSAliq = new COFINSAliq;
$COFINSAliq->CST = "01";
$COFINSAliq->vBC = "1700.00";
$COFINSAliq->pCOFINS = "3.30";
$COFINSAliq->vCOFINS = "56.10";
$COFINS->COFINSAliq = $COFINSAliq;

$imposto->ICMS = $ICMS;
$imposto->IPI = $IPI;
$imposto->PIS = $PIS;
$imposto->COFINS = $COFINS;

$det->imposto = $imposto;

$Total = new Total;
$ICMSTot = new ICMSTot;
$ICMSTot->vBC = "102.00";
$ICMSTot->vICMS = "17.34";
$ICMSTot->vICMSDeson = "0.00";
$ICMSTot->vFCPUFDest = "0.00";
$ICMSTot->vICMSUFDest = "0.00";
$ICMSTot->vICMSUFRemet = "0.00";
$ICMSTot->vBCST = "326.40";
$ICMSTot->vST = "34.14";
$ICMSTot->vProd = "1700.00";
$ICMSTot->vFrete = "0.00";
$ICMSTot->vSeg = "0.00";
$ICMSTot->vDesc = "0.00";
$ICMSTot->vII = "0.00";
$ICMSTot->vIPI = "0.00";
$ICMSTot->vPIS = "28.05";
$ICMSTot->vCOFINS = "56.10";
$ICMSTot->vOutro = "0.00";
$ICMSTot->vNF = "1734.14";
$Total->ICMSTot = $ICMSTot;

$transp = new Transp;
$transp->modFrete = 9;

$infNFe = new InfNFe;
$infNFe->ide = $ide;
$infNFe->emit = $emit;
$infNFe->dest = $dest;
$infNFe->det = $det;
$infNFe->total = $Total;
$infNFe->transp = $transp;
$infNFe->versao = "3.10";
$NFeProc->NFe->infNFe = $infNFe;

echo $NFeProc->toJSON();

?>
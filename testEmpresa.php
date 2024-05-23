<?php
include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'MotoImportada.php';
include_once 'MotoNacional.php';
include_once 'Venta.php';
include_once 'Empresa.php';

// Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2. 
$objCliente1 = new Cliente("estevan","quito",true,"dni","111111");
$objCliente2 = new Cliente("yaqui","sieras",false,"dni","222222");
$colClientes = [$objCliente1,$objCliente2];
 

/*-------------------------------  2 ----------------------------. 
 Cree  4  objetos  Motos  con  la  información  visualizada  en  las  siguientes 
 tablas:  código,  costo,  año  fabricación, 
 descripción, porcentaje incremento anual, activo entre otros. */
$objMoto1 = new MotoNacional("11",2230000,2022,"Benelli Imperiale 400",85,true,10);
$objMoto2 = new MotoNacional("12",584000,2021,"Zanella Zr 150 Ohc",70,true,10);
$objMoto3 = new MotoNacional("13",999900,2023,"Zanella Patagonian Eagle 250",55,false,null);
// ++++++++++  Le pongo null al $descuento para comprobar que funciono el operador ternario. Deberia funcionar para todas las motos nacionales
$objMoto4 = new MotoImportada("14",2230000,2022,"Benelli Imperiale 400",85,true,"Francia",6244400);
$colMotos = [$objMoto1,$objMoto2,$objMoto3,$objMoto4];

$colVentas = [];
$objEmpresa = new Empresa("alta gama","Av Argenetina 123",$colClientes,$colMotos,$colVentas);

/*-------------------------------- 4 ----------------------------------.
 Invocar  al  método  registrarVenta($colCodigosMoto,  $objCliente)  de  la  Clase  
Empresa  donde  el  $objCliente  es  una referencia  a  la  clase  Cliente  almacenada  
en  la  variable  $objCliente2 (creada  en  el  punto  1)  y  la  colección  de  códigos 
de motos es la siguiente [11,12,13,14]. Visualizar el resultado obtenido.  */
$colCodigosMoto = [11,12,13,14];
echo "PRIMERA VENTA:"."\n";
echo "PRECIO VENTA: $ ".$objEmpresa->registrarVenta($colCodigosMoto,$objCliente2)."\n"; 


/*--------------------------------- 5 -------------------------------------.
Invocar  al  método  registrarVenta($colCodigosMotos, $objCliente)  de  la  Clase  Empresa  donde  el  $objCliente  es 
una  referencia  a  la  clase  Cliente  almacenada  en  la  variable  $objCliente2  (creada  en  el  punto  1)  y  la  colección  de 
códigos de motos es la siguiente [13,14].  Visualizar el resultado obtenido.  */
$colCodigosMotos = [13,14];
echo "SEGUNDA VENTA:"."\n";
echo "PRECIO VENTA: $ ".$objEmpresa->registrarVenta($colCodigosMotos,$objCliente2)."\n";


/*------------------------------- 6 ---------------------------------------. 
Invocar  al  método  registrarVenta($colCodigosMotos,  $objCliente)  de  la  Clase  
Empresa  donde  el  $objCliente  es una  referencia  a  la  clase  Cliente  almacenada
en  la  variable  $objCliente2  (creada  en  el  punto  1)  y  la  colección  de 
códigos de motos es la siguiente [14,2].  Visualizar el resultado obtenido.  */
$colCodigosMotos = [14,2];
echo "TERCER VENTA:"."\n";
echo "PRECIO VENTA: $ ".$objEmpresa->registrarVenta($colCodigosMotos,$objCliente2)."\n";

// 7.  Invocar al método  informarVentasImportadas().  Visualizar el resultado obtenido.
$ventasImportadas = $objEmpresa->informarVentasImportadas();
echo "VENTAS IMPORTADAS: "."\n";
foreach($ventasImportadas as $venta){
    echo $venta."\n";
}

//8.  Invocar al método  informarSumaVentasNacionales().  Visualizar el resultado obtenido. 
echo "VENTAS NACIONALES: "."\n".$objEmpresa->informarSumaVentasNacionales()."\n";

// 9.  Realizar un echo de la variable Empresa creada en 2.
echo $objEmpresa;
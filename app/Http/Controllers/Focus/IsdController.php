<?php

namespace miApp\Http\Controllers\Focus;

use miApp\Http\Requests;
use miApp\Http\Controllers\Controller;
// use miApp\Http\Controllers\Focus\Orchestra\Parser\Xml\Reader;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\ValidationException;
use miApp\ItemCountHeaderModel;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;


class IsdController extends Controller {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct() {
		$this->middleware ( 'auth' );
	}

	public function index() {
		$miXml = "hols";
		return view ( 'focus.isd.isd', compact ( 'miXml' ) );
	}
	public function getGraphic(Request $request) {
		// $data = $request->all();
		$myItemCHeader = new ItemCountHeaderModel ();
		$data = $myItemCHeader->getData ( "001", "2014-05-11" );
		// var_dump($data);
		return $data;
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		//
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		// $document = public_path().'/ftp_file/ISD.xml';
		// $reader = new Orchestra\Parser\Xml\Reader($document);
		return "store";
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function show($id) {
		
		/**
		 * ERNESTO GONZALEZ 29-07-2015
		 * Se obtiene el archivo xml se procesa y se crea un arreglo.
		 */
	
		$xmlFile = public_path () . '/ftp_file/ISD.xml';
		if (file_exists ( $xmlFile )) {
			$da = fopen ( $xmlFile, "r" );
			$contenido = "";
			while ( $aux = fgets ( $da, 1024 ) ) {
				$contenido .= $aux;
			}
			$contenido = str_replace ( "&", "and", $contenido );
			$xmlFile = simplexml_load_string ( $contenido );
			// $json = json_encode($xmlFile);
			
			/**
			 * se inicia un procedimiento para registrar la data del array multidimesional
			 * si se procesa exitosamente el registro de la data se ejecuta un commit
			 * para evitar falla de data.
			 */
			$array = ( array ) $xmlFile->ItemCountHeader;
			\DB::beginTransaction ();
			try {
				
				/*
				 * $validator = \Validator::make($array,
				 * ['StoreID' => ['required', 'min:5']]
				 * );
				 *
				 * if ($validator->fails())
				 * {
				 * echo "No ha pasado la validación";
				 * }
				 */
				
				$id = \DB::table ( 'ISD.ItemCountHeader' )->insertGetId ( [ 
						'storeName' => $xmlFile->ItemCountHeader->StoreName,
						'storeId' => $xmlFile->ItemCountHeader->StoreId,
						'alternateStoreId' => $xmlFile->ItemCountHeader->AlternateStoreId,
						'businessDate' => $xmlFile->ItemCountHeader->BusinessDate 
				] );
				foreach ( $xmlFile->ItemCountDetail as $itemCountDetail ) {
					$result = \DB::table ( 'ISD.ItemCountDetail' )->insert ( [ 
							'id_icd' => $itemCountDetail->ID == '' ? null : $itemCountDetail->ID,
							'inventoryID' => $itemCountDetail->InventoryID == '' ? null : $itemCountDetail->InventoryID,
							'vendor' => $itemCountDetail->Vendor == '' ? null : $itemCountDetail->Vendor,
							'vendorID' => $itemCountDetail->VendorID == '' ? null : $itemCountDetail->VendorID,
							'vendorItemID' => $itemCountDetail->VendorItemID == '' ? null : $itemCountDetail->VendorItemID,
							'name' => $itemCountDetail->Name == '' ? null : $itemCountDetail->Name,
							'qtySold' => $itemCountDetail->QtySold == '' ? null : $itemCountDetail->QtySold,
							'sales' => $itemCountDetail->Sales == '' ? null : $itemCountDetail->Sales,
							'price1' => $itemCountDetail->Price1 ['value'] == '' ? null : $itemCountDetail->Price1 ['value'],
							'price2' => $itemCountDetail->Price2 ['value'] == '' ? null : $itemCountDetail->Price2 ['value'],
							'price3' => $itemCountDetail->Price3 ['value'] == '' ? null : $itemCountDetail->Price3 ['value'],
							'price4' => $itemCountDetail->Price4 ['value'] == '' ? null : $itemCountDetail->Price4 ['value'],
							'price5' => $itemCountDetail->Price5 ['value'] == '' ? null : $itemCountDetail->Price5 ['value'],
							'price6' => $itemCountDetail->Price6 ['value'] == '' ? null : $itemCountDetail->Price6 ['value'],
							'id_ich' => $id 
					] );
				} // finFor
				\DB::commit ();
			} catch ( ValidationException $e ) {
				\DB::rollback ();
				echo $e->errors ();
			}
			
			// print $result;
		} else {
			return 'Error abriendo ISD.xml.';
		}
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function edit($id) {
		//
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function update($id) {
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function destroy($id) {
		//
	}
}

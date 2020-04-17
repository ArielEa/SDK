<?php

class Message
{

	public function convertJson( $postData )
	{
		return json_encode( $postData );
	}

	public function convert( $postData, $postType = 'xml' ) : string
	{
	}

	public function convertXmlMes( $data, $root = true, $xmlType = "" )
	{
	    $str = "";

	    if( $root ) $str .= "<request>";

	    foreach($data as $key => $val)
	    {
	        if( is_array( $val ) )
	        {
	            $child = convertMes( $val, false, $xmlType );

	            if ( $xmlType != '' ) {
	            	if (is_numeric( $key )) 
	            		$key = $xmlType;
	            }

	            $str .= "<$key>{$child}</$key>";
	        }
	        else
	        {
	            $str.= "<$key>{$val}</$key>";
	        }
	    }

	    if( $root ) $str .= "</request>";

	    return $str;
	}

	public function convertXml( $param, $xmlType = 'orderLine' )
	{
	    return "<?xml version=\"1.0\" encoding=\"utf-8\"?><response>". convertMes( $param, false ) . "</response>";
	}
}
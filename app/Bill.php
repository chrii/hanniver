<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bon;
use App\Product;

class Bill extends Model
{
    protected $fillable = ['owner_id', 'bon_id', 'completed', 'table_id'];
    protected $primaryKey = 'bill_id'; 

    /**
     * hasMany is the Eloquent Version for a 1:n relation
     * i.e.: 
     * 'SELECT * FROM bons INNER JOIN bills WHERE bons.bill_id=bills.bill_id'
     */
    public function getBons() {
        return $this->hasMany(
            Bon::class,
            'bill_id',
            'bill_id'
        );
    }
    /** 
     * Fetch Input string of a product string and asks Database for products
     * 
     * @return 'JSON'
     * JSON with product_name as Key, adds Tax to the product_wo_tax and outputs the incoming quantity
     */
    public function decodeBonString($rawJsonString) {
        $jsonDec = collect(json_decode($rawJsonString));
        
        $productsDecoded = [];
        foreach( $jsonDec AS $productId => $quantity) {
            $product = Product::find($productId);
            $priceTax = ($product->price_wo_tax /100)*20 + $product->price_wo_tax;
            $priceTax = round($priceTax, 1);
            $quantityPrice = $priceTax * $quantity;
            $productsDecoded[$product->product_name] = ['price' => (string)$priceTax, 'quantity' => $quantity, 'quantity_price' => (string)$quantityPrice];
        }
        $json = json_encode($productsDecoded);
        return $json;
    }
}

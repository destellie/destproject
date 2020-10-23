<?php

namespace App;


class Cart
{
    public $articles=null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        if($oldCart){
            $this->articles = $oldCart->articles;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;

        }
    }
    public function add($article, $id){
        $storedArticle = ['quantity' =>0, 'price' =>$article->price, 'article' =>$article];
        if($this->articles){
            if(array_key_exists($id, $this->articles)){
                $storedArticle = $this->articles[$id];
            }
        }
        $storedArticle['quantity']++;
        $storedArticle['price'] = $article->price * $storedArticle['quantity'];
        $this->articles[$id] = $storedArticle;
        $this->totalQuantity++;
        $this->totalPrice += $article->price;
    }
    public function reduceByOne($id){
        $this->articles[$id]['quantity']--;
        $this->articles[$id]['price'] -= $this->articles[$id]['article']['price'];
        $this->totalQuantity--;
        $this->totalPrice -= $this->articles[$id]['article']['price'];
        if($this->articles[$id]['quantity']<= 0 ){
            unset($this->articles[$id]);
        }
    }
    public function removeArticle($id){
        $this->totalQuantity -= $this->articles[$id]['quantity'];
        $this->totalPrice -= $this->articles[$id]['price'];
        unset($this->articles[$id]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $filters = [
            "number" => "like",
            "amount" => "like",
            "due_at" => "date",
            "paid_at" => "date",
            "status" => "=",
            "supplier_id" => "=",
            "method" => "=",
        ];

        $products = Product::latest()->get();
        /*foreach ($filters as $key => $type) {
            if (request($key) && $type == "like") {
                $products->where($key, "like", "%" . request($key) . "%");
            }
            if (request($key) && $type == "date") {
                $products->whereDate($key, request($key));
            }
            if (request($key) && $type == "=") {
                $products->where($key, "=", request($key));
            }
        }
        if (request("bill_number")) {
            $products->wherehas("bills", function (Builder $query) {
                $query->where(
                    "number",
                    "like",
                    "%" . request("bill_number") . "%"
                );
            });
        }
        $options = ["" => "Tous"];
        foreach (Supplier::all() as $supplier) {
            $options[$supplier->id] = $supplier->name;
        }
        $products = $products->get();
        return view("products", [
            "products" => $products,
            "suppliers" => $options,
            "amount" => $products->sum("amount"),
        ]);*/
        return view('products',['products'=>$products]);
    }
    public function create()
    {
        return view("create-products");
    }
   public function store()
    {
        $attributs = request()->validate([
            "Name" => "required",
            "Height" => "required|numeric",
            "Width" => "required|numeric",
            "Weight" => "required|numeric",
            "Depth" => "required|numeric",
        ]);
        Product::factory()->create([
            "name" => $attributs["Name"],
            "height" => $attributs["Height"],
            "width" => $attributs["Width"],
            "weight" => $attributs["Weight"],
            "depth" => $attributs["Depth"],
        ]);
        return redirect("/");
    }
    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/');
    }
    public function edit($id){
        $product = Product::findOrFail($id);
        return view('edit-product',['product'=>$product]);
    }
    public function update(Request $request, $id){
        echo $request->name;
      $product = Product::findOrFail($id);
        $attributs = [
            "name" => $request->name,
            "height" => $request->height,
            "width" => $request->width,
            "weight" => $request->weight,
            "depth" => $request->depth,
        ];
        $product->update($attributs);
        return redirect('/');
    }
}

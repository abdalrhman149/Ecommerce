<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProductController extends Controller
{


    public function Charts()
    {
        return view();
    }
    public function Addproduct()
    {
        $allcategore = Category::all();

        return view('product.addproduct', ['allcategories' => $allcategore]);
    }

    public function ShowProduct($productid)
    {
        $product = Product::find($productid);

        $relatedProducts = Product::with('category', 'ProductPhoto')->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        return view('product.showProduct', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }


    public function RemoveProduct($productid)
    {
        if ($productid) {
            $currentproduct = Product::find($productid);

            $currentproduct->delete();
        } else {
            abort(403, "please enter product id.");
        }

        return redirect('/');
    }



    public function Storeproduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:25',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required||min:0',
            'description' => 'required|string',
            'photo' => '|image|mimes:jpg,bmp,png|max:2048',
        ]);
        ///edit product
        if ($request->id) {
            $currentproduct = Product::find($request->id);

            $currentproduct->name = $request->name;
            $currentproduct->price = $request->price;
            $currentproduct->quantity = $request->quantity;
            $currentproduct->description = $request->description;
            $currentproduct->category_id = $request->category_id;

            if ($request->has('photo')) {
                $path = $request->photo->move('uploads', Str::uuid()->tostring() . '-' . $request->photo->getClientOriginalName());
                $currentproduct->imagepath = $path;
            } else {
            }
            $currentproduct->save();
            return redirect('/products');
        } else {
            //store product

            $newproduct = new Product();
            $newproduct->name = $request->name;
            $newproduct->price = $request->price;
            $newproduct->quantity = $request->quantity;
            $newproduct->description = $request->description;
            $path = '';
            if ($request->has('photo')) {
                $path = $request->photo->move('uploads', Str::uuid()->tostring() . '-' . $request->photo->getClientOriginalName());
            }
            $newproduct->imagepath = $path;
            $newproduct->category_id = $request->category_id;



            $newproduct->save();
            return redirect('/addproduct');
        }
    }


    public function EditProduct($productid = null)
    {


        $editproduct = Product::find($productid);
        if ($editproduct != null) {
            $editproduct = Product::find($productid);
            $allcategore = Category::all();

            QrCode::generate('hello, world');
            $qrcode = QrCode::size(200)->generate('hello,world');


            // $barcode = new DNS1D();
            $barcode = DNS1D::getBarcodeHTML('005656564841', 'C39');

            return view('product.editproduct', ["product" => $editproduct, "allcategories" => $allcategore, 'qrcode' => $qrcode, 'barcode' => $barcode]);
        } elseif ($productid = null) {
            abort("403", "Can't Find this product");
        }
    }
    public function ProductsTable()
    {
        $products = Product::all();
        return view('product.ProductsTable', ['products' => $products]);
    }


    public function AddproductImage($productid)
    {
        $product = Product::find($productid);
        $productImages = ProductPhoto::where('product_id', $productid)->get();
        return view('product.Addproductimage', ['product' => $product, 'productImages' => $productImages, 'productid' => $productid]);
    }

    public function RemoveProductPhoto($productphotoid = null)
    {
        $productImage = ProductPhoto::find($productphotoid);

        if (!$productImage) {
            return redirect()->back()->with('error', 'Product photo not found');
        }

        $productImage->delete();

        return redirect()->back()->with('success', 'Product photo deleted successfully');
    }






    public function StoreproductImages(Request $request)
    {
        $request->validate([
            'product_id' => 'required',

            'photo' => '|image|mimes:jpg,bmp,png|max:2048',
        ]);
        $photo = new ProductPhoto();
        $photo->product_id = $request->product_id;
        $photo->imagepath = $request->photo;
        $path = '';
        if ($request->has('photo')) {
            $path = $request->photo->move('uploads', Str::uuid()->tostring() . '-' . $request->photo->getClientOriginalName());
            $photo->imagepath = $path;
        }
        $photo->save();

        return redirect("AddproductImage/{$request->product_id}")->with('success', 'Image uploaded successfully');
    }
}

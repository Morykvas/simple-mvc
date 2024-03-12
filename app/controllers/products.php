<?php 

// use Database\Database;
// use requestDb\Database\Database;

use controllers\ErrorController\ErrorController;
// require_once 'home.php';

class Products extends Controller  {
    private $errorController;
    private $productModel;
    private $error;
    private $check;
    private $category;
    private $productsId;

 
    public function __construct()
    {
        $this->productModel = $this->model('ModelProducts');
        $this->category = $this->model('ModelCategory');
        $this->productsId = $this->model('ModelProductsId');
        $this->errorController = new ErrorController();
    }
    
    public function id($id = null) 
    {
             
        $product = $this->productsId->getProductById($id);
        $productData = array();
        foreach ($product as $kay) {
            foreach ($kay as $kays => $values) {
              $productData[$kays] = $values;
            }
        }
        
        if (!$product) {
            $errorController = $this->errorController;
            $errorController->notFound();
            return; 
        }

        $this->view('products/product', ['name' => $productData,  'title' => 'Product by Id']);
    
    }

    public function all() {
       
        $allProducts = $this->productModel->allProducts();
        $allProductData = array();
        
        foreach ($allProducts as $product) {
            $productData = $product;
            $allProductData[] = $productData;
        }

        $this->view('products/products', ['name' => $allProductData, 'title' => 'Products All']);
    }    
    
    public function index() 
    {
        $this->error = new ErrorController();
        $this->error->notFound();
    } 

    public function category($category = null) {
        try {
            if(empty($category)) {
                $errorController = $this->errorController;
                $errorController->notFound();
                return; 
            }
            $categories = $this->category->productCategory($category);
            foreach($categories as $category) {
               $categoryName = $category['category_name'];
            }
            
            $this->view('products/category', ['products' => $categories, 'title' => $categoryName]);
           

        } catch(PDOException $e) {
            echo 'Запит НЕ вдалий, не вдалось отримати категорію!  ' . $e->getMessage() . '  ' . $e->getLine();
        }
    }
}


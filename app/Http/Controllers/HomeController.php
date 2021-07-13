<?php

namespace App\Http\Controllers;

use App\Exports\ProductRExport;
use App\Models\Customer;
use App\Models\MaintenanceRequest;
use App\Models\Package;
use App\Models\Product;
use App\Models\ProductRequest;
use App\Models\Status;
use App\Models\TransportCompanies;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $statusId = Status::where('name', 'Новый')->first()->id;
        $newRequests = ProductRequest::where('status_id', $statusId)->get();
        return view('home', compact('newRequests', 'statusId'));
    }
    public function editRequestProduct($id)
    {
        $productRequest = ProductRequest::find($id);
        $products = Product::get();
        $statuses = Status::get();
        $customers = Customer::get();
        $packages = Package::get();
        return view('editrequestproduct', compact('productRequest', 'products', 'statuses', 'customers', 'packages'));
    }
    public function updateRequestProduct()
    {
        $date = $_POST['Date'];
        $address = $_POST['address'];
        $product_id = $_POST['IdProduct'];
        $client_id = $_POST['IdCustomer'];
        $package_id = $_POST['IdPackage'];
        $phone = $_POST['Phone'];
        $email = $_POST['Email'];
        $comment = $_POST['Comment'];
        $status_id = $_POST['IdStatus'];
        $productRequest_id = $_POST['productRequest_id'];
        ProductRequest::where('id', $productRequest_id)->update([
            'date' => $date,
            'adress' => $address,
            'phone' => $phone,
            'email' => $email,
            'comment' => $comment,
            'customer_id' => $client_id,
            'user_id' => Auth::user()->id,
            'product_id' => $product_id,
            'status_id' => $status_id,
            'package_id' => $package_id,
        ]);
        return redirect('/home');
    }
    public function productrequestprocess()
    {
        $statusId = Status::where('name', 'В процессе')->first()->id;
        $newRequests = ProductRequest::where('status_id', $statusId)->get();
        return view('productrequestprocess', compact('newRequests', 'statusId'));
    }
    public function productrequestfinish()
    {
        $statusId = Status::where('name', 'Завершенный')->first()->id;
        $newRequests = ProductRequest::where('status_id', $statusId)->get();
        return view('productrequestfinish', compact('newRequests', 'statusId'));
    }
    public function productRequestCreate()
    {
        $products = Product::get();
        $statuses = Status::get();
        $customers = Customer::get();
        $packages = Package::get();
        return view('productrequestcreate', compact('products', 'statuses', 'customers', 'packages'));
    }
    public function productRequestAdd()
    {
        $date = $_POST['Date'];
        $address = $_POST['address'];
        $product_id = $_POST['IdProduct'];
        $client_id = $_POST['IdCustomer'];
        $package_id = $_POST['IdPackage'];
        $phone = $_POST['Phone'];
        $email = $_POST['Email'];
        $comment = $_POST['Comment'];
        $status_id = $_POST['IdStatus'];
        ProductRequest::create([
            'date' => $date,
            'adress' => $address,
            'phone' => $phone,
            'email' => $email,
            'comment' => $comment,
            'customer_id' => $client_id,
            'user_id' => Auth::user()->id,
            'product_id' => $product_id,
            'status_id' => $status_id,
            'package_id' => $package_id,
        ]);
        return redirect('/home');
    }
    public function maintenance()
    {
        $activeRequests = MaintenanceRequest::get();
        return view('maintenance', compact('activeRequests'));
    }
    public function editMaintenance($id)
    {
        $maintenanceRequest = MaintenanceRequest::find($id);
        $products = Product::get();
        $statuses = Status::get();
        $customers = Customer::get();
        $packages = Package::get();
        return view('editrequestmaintenance', compact('maintenanceRequest', 'products', 'statuses', 'customers', 'packages'));
    }
    public function updateMaintenance()
    {
        $date = $_POST['Date'];
        $product_id = $_POST['IdProduct'];
        $client_id = $_POST['IdCustomer'];
        $comment = $_POST['Comment'];
        $status_id = $_POST['IdStatus'];
        $maintenanceRequest_id = $_POST['maintenanceRequest_id'];
        MaintenanceRequest::where('id', $maintenanceRequest_id)->update([
            'date' => $date,
            'comment' => $comment,
            'customer_id' => $client_id,
            'user_id' => Auth::user()->id,
            'product_id' => $product_id,
            'status_id' => $status_id,
        ]);
        return redirect('/maintenance');
    }
    public function createMaintenance()
    {

        $products = Product::get();
        $statuses = Status::get();
        $customers = Customer::get();
        $packages = Package::get();
        return view('createrequestmaintenance', compact('products', 'statuses', 'customers', 'packages'));
    }
    public function addMaintenance()
    {
        $date = $_POST['Date'];
        $product_id = $_POST['IdProduct'];
        $client_id = $_POST['IdCustomer'];
        $comment = $_POST['Comment'];
        $status_id = $_POST['IdStatus'];
        MaintenanceRequest::create([
            'date' => $date,
            'comment' => $comment,
            'customer_id' => $client_id,
            'user_id' => Auth::user()->id,
            'product_id' => $product_id,
            'status_id' => $status_id,
        ]);
        return redirect('/maintenance');
    }
    public function client()
    {
        $customers = Customer::get();
        return view('customers', compact('customers'));
    }
    public function editClient($id)
    {
        $customer = Customer::find($id);
        return view('editclient', compact('customer'));
    }
    public function updateClient()
    {
        $name = $_POST['Name'];
        $phone = $_POST['Phone'];
        $email = $_POST['Email'];
        $customer_id = $_POST['customer_id'];
        Customer::where('id', $customer_id)->update([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
        ]);
        return redirect('/client');
    }
    public function createClient()
    {
        return view('createclient');
    }
    public function addClient()
    {
        $name = $_POST['Name'];
        $phone = $_POST['Phone'];
        $email = $_POST['Email'];
        Customer::create([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
        ]);
        return redirect('/client');
    }
    public function product()
    {
        $products = Product::get();
        return view('product', compact('products'));
    }
    public function editProduct($id)
    {
        $product = Product::find($id);
        $statuses = Status::get();
        return view('editproduct', compact('product', 'statuses'));
    }
    public function updateProduct()
    {
        $name = $_POST['Name'];
        $description = $_POST['Description'];
        $size = $_POST['Size'];
        $price = $_POST['Price'];
        $status_id = $_POST['IStatus'];
        $product_id = $_POST['product_id'];
        Product::where('id', $product_id)->update([
            'name' => $name,
            'description' => $description,
            'size' => $size,
            'price' => $price,
            'status_id' => $status_id,
        ]);
        return redirect('/product');
    }
    public function createProduct()
    {
        $statuses = Status::get();
        return view('addproduct', compact('statuses'));
    }
    public function addProduct()
    {
        $name = $_POST['Name'];
        $description = $_POST['Description'];
        $size = $_POST['Size'];
        $price = $_POST['Price'];
        $status_id = $_POST['IStatus'];
        Product::create([
            'name' => $name,
            'description' => $description,
            'size' => $size,
            'price' => $price,
            'status_id' => $status_id,
        ]);
        return redirect('/product');
    }
    public function package()
    {
        $packages = Package::get();
        return view('package', compact('packages'));
    }
    public function editPackage($id)
    {
        $package = Package::find($id);
        $companies = TransportCompanies::get();
        return view('editpackage', compact('package', 'companies'));
    }
    public function updatePackage()
    {
        $name = $_POST['Name'];
        $track_number = $_POST['TrackNumber'];
        $company_id=$_POST['IdTransportCompany'];
        $package_id=$_POST['package_id'];
        Package::where('id', $package_id)->update([
            'name'=>$name,
            'track_number'=>$track_number,
            'transport_company_id'=>$company_id,
        ]);
        return redirect('/package');
    }
    public function createPackage(){
        $companies = TransportCompanies::get();
        return view('createpackage', compact('companies'));
    }
    public function addPackage(){
        $name = $_POST['Name'];
        $track_number = $_POST['TrackNumber'];
        $company_id=$_POST['IdTransportCompany'];
        Package::create([
            'name'=>$name,
            'track_number'=>$track_number,
            'transport_company_id'=>$company_id,
        ]);
        return redirect('/package');
    }
    public function deleteCustomer(){
        $customer_id=$_POST['customer_id'];
        Customer::find($customer_id)->delete();
        return redirect('/client');
    }
    public function deleteProductRequest(){
        $id=$_POST['id'];
        ProductRequest::find($id)->delete();
        return redirect('/home');
    }
    public function deleteMaintenanceRequest(){
        $id=$_POST['id'];
        MaintenanceRequest::find($id)->delete();
        return redirect('/maintenance');
    }
    public function deleteProduct(){
        $id=$_POST['id'];
        Product::find($id)->delete();
        return redirect('/product');
    }
    public function deletePackage(){
        $id=$_POST['id'];
        Package::find($id)->delete();
        return redirect('/package');
    }
    public function export(){
        return \Excel::download(new ProductRExport, 'disney.xlsx');
    }
}
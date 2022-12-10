<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\Cache;
 
class UserController extends Controller
{
    /**
     * Show a list of all users of the application.
     * Obtaining A Cache Instance
     *
     * @return Response
     */
    public function index()
    {
        $value = Cache::get('key');
 
        //
    }
}
//Accessing Multiple Cache Stores
$value = Cache::store('file')->get('foo');
 
Cache::store('redis')->put('bar', 'baz', 600); // 10 Minutes
//Retrieving Items From The Cache
$value = Cache::get('key');
 
$value = Cache::get('key', 'default');
//Checking For Item Existence
if (Cache::has('key')) {
    //
}
//Incrementing / Decrementing Values
Cache::increment('key');
Cache::increment('key', $amount);
Cache::decrement('key');
Cache::decrement('key', $amount);
//Retrieve & Store
$value = Cache::remember('users', $seconds, function () {
    return DB::table('users')->get();
});
/* 
If the item does not exist in the cache
*/
$value = Cache::rememberForever('users', function () {
    return DB::table('users')->get();
});
//$value = Cache::pull('key');
$value = Cache::pull('key');
//Storing Items In The Cache
Cache::put('key', 'value', $seconds = 10);
/*
If the storage time is not passed to the put method, the item will be stored indefinitely:*/
Cache::put('key', 'value');
/*
Instead of passing the number of seconds as an integer, you may also pass a DateTime instance representing the desired expiration time of the cached item:*/
Cache::put('key', 'value', now()->addMinutes(10));

//Removing Items From The Cache
Cache::forget('key');
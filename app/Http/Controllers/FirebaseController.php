<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Kreait\Firebase\Exception\DatabaseException;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use App\Http\Service\RealTimeService;


class FirebaseController extends Controller
{
    protected $db;
    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    // -------------------- [ Insert Data ] ------------------

    public function index() {

       /* $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/FirebaseKey.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://laravel6firebase-d6e0e.firebaseio.com/')
            ->create();*/
        try {
            $createPost = $this->db->getReference('blog/posts')->push([
                'title' => 'New Test',
                'body' => 'Firebase real time database testing'
            ]);
        } catch (DatabaseException $e) {
            print_r($e);
        }

        echo '<pre>';
        print_r($createPost->getvalue());
        echo '</pre>';

    }
}

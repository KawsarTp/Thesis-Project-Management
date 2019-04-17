<?php 
namespace App\Http\Controllers;

use App\Hook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use App\Git;
use Auth;

class GitController extends Controller
{

   private $client;
  /*
   * Github username
   *
   * @var string
   * */
  private $user_name;

  private $password;
  private $email;
  


  public function __construct(\Github\Client $client)
  {
    $this->client = $client;
    $this->middleware(function ($request, $next) {
      if(Git::find(Auth::guard('student')->user()->id) == true){
      $a = Git::where('user_id',Auth::guard('student')->user()->id)->first();
      
      $env_update = $this->changeEnv([
            'GITHUB_USERNAME'=> $a->user_name,
            'GITHUB_PASSWORD'=> $a->password,
            'GITHUB_EMAIL'   => $a->email,
            'GITHUB_TOKEN'   => $a->token
      ]);
      $this->user_name = $a->user_name;
        return $next($request);
      }
    });
  
    }

   protected function changeEnv($data = array()){
      
        if(count($data) > 0){

            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);;

            // Loop through given data
            foreach((array)$data as $key => $value){

                // Loop through .env-data
                foreach($env as $env_key => $env_value){

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if($entry[0] == $key){
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);
            
            return true;
        } else {
            return false;
        }
    }


  public function index()
  {

    try {
      $repos = $this->client->api('current_user')->repositories();
    
    return View('frontend.student.welcome', ['repos' => $repos]);
    } catch (\RuntimeException $e) {
      return "No repository Found";
    }
  }//index




  public function finder()
{
  $repo = request()->get('repo');

  $path = request()->get('path','.');
 try {
  $contributors = $this->client->api('repo')->contributors($this->user_name, $repo);
  // dd($contributors);
    $result = $this->client->api('repo')->contents()->show($this->user_name, $repo, $path);
    return View('frontend.student.finder', ['parent' => dirname($path), 'repo' => $repo, 'items' => $result,'path'=>$path,'contributors'=>$contributors]);
}catch(\RuntimeException $e) {
      $a = Git::where('user_id',auth()->guard('student')->user()->id)->first();
      return view('frontend.student.gitrepo',compact('a'));
  }
    
  
}//finder


public function edit()
{
  $repo = request()->get('repo');
  $path = request()->get('path');

  try {
    $file = $this->client->api('repo')->contents()->show($this->user_name, $repo, $path);

    $content = base64_decode($file['content']);
    $commitMessage = "Updated file " . $file['name'];

    return View('frontend.student.file_update', [
        'file'    => $file,
        'path'    => $path,
        'repo'    => $repo,
        'content' => $content,
        'commitMessage'  => $commitMessage
    ]);
  } catch (\RuntimeException $e) {
    $this->handleAPIException($e);
  }
}//edit



public function update()
{
  $repo = request()->get('repo');
  $path = request()->get('path');
  $content = request()->get('content');
  $commit = request()->get('commit');
  // dd($commit);
  try {
    $oldFile = $this->client->api('repo')->contents()->show($this->user_name, $repo, $path);
    $result = $this->client->api('repo')->contents()->update(
        $this->user_name,
        $repo,
        $path,
        $content,
        $commit,
        $oldFile['sha']
    );

    return Redirect('/git');
  } catch (\RuntimeException $e) {
    $this->handleAPIException($e);
  }
}//update



  public function commits(){
  $repo = request()->get('repo');
  $path = request()->get('path');
  // dd($repo);
      try {
        $commits = $this->client->api('repo')->commits()->all($this->user_name, $repo, ['path' => $path]);

        return View('frontend.student.commit', ['commits' => $commits]);
        } catch (\RuntimeException $e) {
        $this->handleAPIException($e);
      }
    }//commit

    public function findRepository(){
      $repo = request('repo');
      $description = request('description');
     $repos = $this->client->api('repo')->create($repo, $description, true);
    
     return redirect()->back()->with('repos',$repos);
    }


    public function updateRepository(){
      $repository = request('repo');
      $repo = $this->client->api('repo')->update('username', $repository, array('description' => 'some new description'));
    }

    public function createBlob(){
      $blob = $this->client->api('gitData')->blobs()->create($this->user_name, 'laracast' , ['content' => 'Test content', 'encoding' => 'utf-8']);
      // dd($blob);
     

      dd($commit);
    }    

    public function gitstore(){
      $a = Git::create([
        'user_id'=>request('user_id'),
        'token'=>request('token'),
        'email'=>request('email'),
        'user_name'=>request('user_name'),
        'password'=>request('password')
      ]);
      // dd($a);
      return redirect()->back();
    }

   
}

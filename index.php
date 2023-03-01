<?php

class DB
{
    protected $st, $ds;
    public function __construct()
    {
        $this->ds = new PDO('mysql:dbname=gunzxxmy_hbd;host=gunzxx.my.id', 'gunzxxmy_hbd', 'Sandiuno_');
    }
    public function query(string $query)
    {
        $this->st = $this->ds->prepare($query);
    }
    public function getDatas()
    {
        $this->query("select * from message");
        $this->st->execute();
        return $this->st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertData()
    {
        $sender = htmlspecialchars($_POST['sender']);
        $message = htmlspecialchars($_POST['message']);
        $this->query("INSERT INTO message(sender,message) VALUES ('$sender','$message')");
        $this->st->execute();
    }
}

$db = new DB();
if (isset($_POST['kirim'])) {
    $db->insertData();
}
$res = $db->getDatas();

// var_dump($res);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hbd for me:_</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mouse+Memoirs&display=swap" rel="stylesheet">

    <link href="./dist/output.css" rel="stylesheet">
</head>

<body class="h-[100vh] flex flex-col items-center justify-center bg-sky-200">
    <p class="text-xl mb-5 text-emerald-800">Build with Laravel 15.0.3</p>
    <!-- <h3 class="mb-5">HBD For me:))</h3> -->
    <div class="w-[90%] p-10 bg-slate-100 flex flex-col items-center justify-center shadow-lg rounded-lg">
        <h2 class="text-emerald-600 text-2xl mb-5">Silahkan isi pesan dan kesan 🗿</h2>

        <form action="" method="post" class="w-full flex flex-col items-end m-0">
            <div class="flex flex-col items-start justify-center w-full mb-5 z-99">
                <label class="mb-3 text-emerald-800" for="sender">Pengirim</label>
                <input class="focus:outline-none text-emerald-800 shadow-md rounded-lg w-full py-2 px-7" type="text" name="sender" id="sender" placeholder="Inisial (opsional)">
            </div>
            <div class="flex flex-col items-start justify-center w-full mb-5 z-99">
                <label class="mb-3 text-emerald-800" for="message">Pesan & kesan</label>
                <textarea autofocus required class="focus:outline-none text-emerald-800 shadow-md rounded-lg w-full py-2 px-7" type="text" name="message" id="message" placeholder="Pesan"></textarea>
            </div>
            <button id="send" name="kirim">
                <div class="svg-wrapper-1">
                    <div class="svg-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                        </svg>
                    </div>
                </div>
                <span>Send</span>
            </button>
        </form>
        <p class="mt-9 text-emerald-600">ada easter egg-nya!!</p>
    </div>
    <p class="mt-9 text-emerald-600">Time goes run, don't lazy!!</p>
</body>

</html>
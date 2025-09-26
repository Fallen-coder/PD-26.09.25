<?php

// 4. Uzlabojiet datu struktūru tā, lai katras grāmatas dati tiktu glabāti klases instancēs nevis asociatīvajos masīvos. done
// $books masīvs drīkst palikt nemainīgs ar indeksiem 1, 2, 3 utt., pēc kuriem joprojām grāmatas varēs meklēt.
//  Klasē jābūt tikai trim atribūtiem: 'title', 'author' un 'status'. done
// Klasi veidojiet atsevišķā failā Book.php un ar 'require_once' iekļaujiet to aplikācijas failā.
// Papildus kontruktoram, klasē ir jābūt metodēm 'display' un 'setStatus'.

require_once "Book.php";


$continue =true;
$books = [
    New Book('The Great Gatsby','F. Scott Fitzgerald',"available"),
    New Book('1984','George Orwell',"available"),
    New Book ('Pride and Prejudice','Jane Austen',"available") 
];

function addBook(&$books) {
    $title = readline("Enter title: ");
    $author = readline("Enter author: ");
    $books[] = New Book($title,$author,"available");
}

function deleteBook(&$books) {
    $id = readline("Enter book ID you want to delete: ");
    unset($books[$id]);
}

// function displayBook($id, $book) {
//     echo "ID: {$id} // Title: ". $book['title'] . " // Author: " . $book['author']. " // status: " . $book['status']. "\n\n";
// }
// function status(&$books){
    
//     $status = readline("Enter A-available//N-not available: ");
//     if( $status =="A"||$status =="a"){
//         $books["status"]="available";
//         echo "status changed";
//     }elseif ($status =="N"||$status =="n") {
//         $books["status"]="not available";
//         echo "status changed";
//     }else{
//         echo "no such thing exist";
//     }
// }

function choice($choice,&$books){
    switch ($choice) {
        case 1:
            foreach ($books as $id => $book) {
                $book->display($id);
            }

            break;
        case 2:
            $id = readline("Enter book id: ");
            $books[$id]->display($id);

            break;
        case 3:
            addBook($books);
            break;
        case 4:
            deleteBook($books);
            break;
        case 5:
            $id = readline("Enter book ID you want to change status: ");
            $status = readline("Enter A-available//N-not available: ");
            $books[$id]->setstatus($status);
        break;
        case 6:
            echo "Goodbye!\n";
            $continue = false;
            break;
        case 13:
            print_r($books); // hidden option to see full $books content
            break;
        default:
            echo "Invalid choice\n";
    };
}
echo "\n\nWelcome to the Library\n";

do {
    echo "\n\n";
    echo "1 - show all books\n";
    echo "2 - show a book\n";
    echo "3 - add a book\n";
    echo "4 - delete a book\n";
    echo "5 - Change status\n";
    echo "6 - quit\n\n";
    $choice = readline();
    choice($choice,$books);
    

} while ($continue == true);
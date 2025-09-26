<?php
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
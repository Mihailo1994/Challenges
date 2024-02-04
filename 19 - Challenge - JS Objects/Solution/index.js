
class Book {
    constructor(_title, _author, _maxPage, _onPage) {
        this.title = _title;
        this.author = _author;
        this.maxPage= _maxPage;
        this.onPage = _onPage;
    }
}

let book1 = new Book("The Hobbit", "J.R.R Tolken", 200, 60);
let book2 = new Book("Harry Potter", "J.K.Rowling", 250, 150);
let book3 = new Book("50 Shades of Grey", "E.L.James", 150, 150);
let book4 = new Book("Don Quixote", "Miguel de Cervantes", 350, 300);
let book5 = new Book("Hamlet", "William Shakespeare", 550, 150);

let books = [book1, book2, book3, book4, book5];

function bookDisplay(books) {
    books.forEach(function(value){
    let bookSection = document.getElementById("bookSection");
    let liElement = document.createElement("li");
    liElement.innerHTML = `${value.title} by ${value.author}`;
    bookSection.appendChild(liElement);

    let bookStatus = document.getElementById("bookStatus");
    let liElement2 = document.createElement("li");
    
    if (value.maxPage > value.onPage) {
        var status = "You still need to read";
    } else {
        var status = "You already have read"; 
    }

    liElement2.innerHTML = `${status} ${value.title} ${value.author}`;
    bookStatus.appendChild(liElement2);

    let bookTable = document.getElementById("bookTable");
    let tableRow = document.createElement("tr");
    bookTable.appendChild(tableRow);

    let title = document.createElement("td");
    let author = document.createElement("td");
    let maxPage = document.createElement("td");
    let onPage = document.createElement("td");
    let progress = document.createElement("td");

    progress.style.backgroundColor = "grey";
    progress.style.width = "100px";

    let p = document.createElement("p");
    progress.appendChild(p);

    let percentage = Math.trunc((value.onPage / value.maxPage) * 100);

    p.innerHTML = `${percentage}%`;
    p.style.width = `${percentage}%`;
    p.style.backgroundColor = "green";
    p.style.color = "white";
    p.style.margin = "0";

    title.innerHTML = value.title;
    author.innerHTML = value.author;
    maxPage.innerHTML = value.maxPage;
    onPage.innerHTML = value.onPage;

    tableRow.appendChild(title);
    tableRow.appendChild(author);
    tableRow.appendChild(maxPage);
    tableRow.appendChild(onPage);
    tableRow.appendChild(progress);
    }
    )
}

bookDisplay(books);


let addBook = document.getElementById("addBook");

addBook.addEventListener("submit", function(e) {  
    e.preventDefault();

    let bookTitle = document.getElementById("bookTitle").value;
    let bookAuthor = document.getElementById("bookAuthor").value;
    let bookCurrentPage = document.getElementById("bookCurrentPage").value;
    let bookPages = document.getElementById("bookPages").value;
    
    if (bookTitle.length > 0 && bookAuthor.length > 0 && bookCurrentPage > 0 && bookPages > 0 ) {
        if(Number(bookCurrentPage) != NaN && Number(bookPages) != NaN && bookPages >= bookCurrentPage){
            let book = new Book (bookTitle, bookAuthor, bookPages, bookCurrentPage)
            let newBooks = [];
            newBooks.push(book);
            console.log(books);

            bookDisplay(newBooks);
            
            addBook.reset();
        }     
    }
})  


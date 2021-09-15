import { Component, OnInit } from '@angular/core';
import {Book} from '../book';
import {BookService} from '../book.service';


@Component({
  selector: 'app-book-home',
  templateUrl: './book-home.component.html',
  styleUrls: ['./book-home.component.scss']
})
export class BookHomeComponent implements OnInit {

  listBook!: Book[];
  book!: Book;
  constructor(public bookService: BookService) {
  }

  getAll(): void {
    this.bookService.getAll().subscribe(data => {
    this.listBook = data;
    console.log(this.listBook);
    }, error => {
      console.log(error);
    });
  }
  delete(id: any): void {
    this.bookService.delete(id).subscribe(data => {
      this.getAll();
    });
  }
  ngOnInit(): void {
    this.book = new class implements Book {
      adders: any;
      categories: any;
      cover: any;
      description: any;
      id: any;
      idAuthor: any;
      language: any;
      orders: any;
      owners: any;
      photo: any;
      price: any;
      title: any;
      value: any;
      year: any;
    }();
    this.getAll();
  }
  update(book: any): void {
    this.bookService.update(this.book).subscribe(data => {
    });
  }

}


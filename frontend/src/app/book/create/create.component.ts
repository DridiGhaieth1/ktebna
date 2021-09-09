import { Component, OnInit } from '@angular/core';
import {Author} from '../../model/author';
import {Book} from '../book';
import {BookService} from '../book.service';
import {AuteurService} from "../../services/auteur.service";

@Component({
  selector: 'app-create',
  templateUrl: './create.component.html',
  styleUrls: ['./create.component.scss']
})
export class CreateComponent implements OnInit {
  listBook!: Book[];
 listAuthor!: Author[];
  book = new Book();
  author = new Author();
 constructor(private bookService: BookService, private authorService: AuteurService) { }
  ngOnInit(): void {
   this.getAll();
  }
  save(): void {
   let val!: string ;
   val = this.book.idAuthor;
   this.book.idAuthor = '/api/authors/' + val ;
   this.bookService.post(this.book).subscribe(data => {
      console.log('data', data);
    });
  }
  getAll(): void {
    this.authorService.getAuthor().subscribe(data => {
      this.listAuthor = data;
      console.log(this.listAuthor);
    }, error => {
      console.log(error);
    });
  }
onChange(id: any): any {
//   this.book.idAuthor = id;
   console.log('fshhf', id);
}
}

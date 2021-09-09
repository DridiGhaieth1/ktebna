import { Component, OnInit } from '@angular/core';
import {Author} from '../model/author';
import {AuteurService} from '../services/auteur.service';

@Component({
  selector: 'app-auteur',
  templateUrl: './auteur.component.html',
  styleUrls: ['./auteur.component.scss']
})
export class AuteurComponent implements OnInit {
  listAuthor!: Author[];
  author!: Author;
  author1!: Author;
  term = '';
  constructor(private authorService: AuteurService) {
  }

  getAll(): void {
    this.authorService.getAuthor().subscribe(data => {
      this.listAuthor = data;
      console.log(this.listAuthor);
    }, error => {
      console.log(error);
    });
  }
  deleteAuthor(id: any): void {
    this.authorService.deleteAuthor(id).subscribe(data => {
      this.getAll();
    });
  }
  ngOnInit(): void {
    this.author = new Author();
    this.author1 = new Author();
    this.getAll();
  }
  updateAuthor(author: any): void {
    this.authorService.updateAuthor(this.author).subscribe(data => {
    });
  }

  getByid(author: any): void {
    this.author1 = Object.create(author);

  }

  saveUpdate(): void {
    this.authorService.updateAuthor(this.author1).subscribe(data => {
      this.listAuthor[this.findIndexById(this.author1.id)] = this.author1;
      console.log('data', data);
      this.listAuthor.push(data);
    }, err => {
      console.log(err);
    });
  }

  findIndexById(id: string): number {
    let index = -1;
    for (let i = 0; i < this.listAuthor.length; i++) {
      if (this.listAuthor[i].id === id) {
        index = i;
        break;
      }
    }

    return index;
  }
}

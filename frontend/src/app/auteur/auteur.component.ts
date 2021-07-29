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
  ngOnInit(): void {
    this.author = new Author();
    this.getAll();
  }

}

import { Component, OnInit } from '@angular/core';
import {AuteurService} from '../services/auteur.service';
import {Author} from '../model/author';

@Component({
  selector: 'app-add-auteur',
  templateUrl: './add-auteur.component.html',
  styleUrls: ['./add-auteur.component.scss']
})
export class AddAuteurComponent implements OnInit {
  listAuthor!: Author[];
  author = new Author();
  constructor(private authorService: AuteurService) {
  }
  ngOnInit(): void {
  }
  save(): void {
    this.authorService.postAuthor(this.author).subscribe(data => {
      console.log('data', data);
      this.listAuthor.push(data);
    });
  }


}

// todo: (interaction) Votre application doit contenir au moins un composant parent et un composant fils
import {Component, OnInit} from '@angular/core';
import {ApiService} from '../shared/api.service';
import {Cases} from '../model/cases';
import {Router} from '@angular/router';

@Component({
  selector: 'app-cases-list',
  templateUrl: './cases-list.component.html',
  styleUrls: ['./cases-list.component.scss']
})

export class CasesListComponent implements OnInit {

  list?: Cases[];

  constructor(private api: ApiService, private router: Router) {
    this.api = api;
    this.router = router;
  }

  ngOnInit(): void {
    this.api.getCases()
      .subscribe((res: any) => {
        this.list = res;
      }, err => {
        console.log(err);
      });
  }

  // noinspection DuplicatedCode
  deleteCases(caseDetails: Cases): void {
    const index = this.list?.indexOf(caseDetails);
    // noinspection JSUnusedLocalSymbols
    this.api.deleteCases(caseDetails.id as unknown as string)
      .subscribe(res => {
          this.list?.splice(index as number, 1);
        }, (err) => {
          console.log(err);
        }
      );
  }

}

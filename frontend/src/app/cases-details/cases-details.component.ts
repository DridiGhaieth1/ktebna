import {Component, OnInit} from '@angular/core';

import {ActivatedRoute, Router} from '@angular/router';
import {ApiService} from '../shared/api.service';
import {Cases} from '../model/cases';
import {DatePipe} from '@angular/common';

@Component({
  selector: 'app-cases-details',
  templateUrl: './cases-details.component.html',
  styleUrls: ['./cases-details.component.scss'],
  providers: [DatePipe]
})
export class CasesDetailsComponent implements OnInit {

  currentDate = new Date();

  cases: Cases = {id: 0, name: '', gender: '', age: 0, address: '', city: '', country: '', status: '', updated: this.currentDate};
  isLoadingResults = true;

  constructor(private route: ActivatedRoute, private api: ApiService, private router: Router) {
    this.route = route;
    this.api = api;
    this.router = router;
  }

  getCasesDetails(id: string): void {
    this.api.getCasesById(id)
      .subscribe((data: any) => {
        this.cases = data;
        console.log(this.cases);
        this.isLoadingResults = false;
      });
  }

  deleteCases(id: any): void {
    this.isLoadingResults = true;
    // noinspection JSUnusedLocalSymbols
    this.api.deleteCases(id)
      .subscribe(res => {
          this.isLoadingResults = false;
          this.router.navigate(['/cases']).then(r => console.log(r));
        }, (err) => {
          console.log(err);
          this.isLoadingResults = false;
        }
      );
  }

  ngOnInit(): void {
    this.getCasesDetails(this.route.snapshot.params.id);
  }

}

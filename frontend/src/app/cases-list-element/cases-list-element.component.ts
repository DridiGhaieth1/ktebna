// todo: (interaction) Votre application doit contenir au moins un composant parent et un composant fils
import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {Cases} from '../model/cases';

@Component({
  selector: 'app-cases-list-element',
  templateUrl: './cases-list-element.component.html',
  styleUrls: ['./cases-list-element.component.scss']
})

export class CasesListElementComponent implements OnInit {

  @Input() caseDetails?: Cases;
  @Output() deleteEvent = new EventEmitter<Cases>();

  constructor() {
  }

  ngOnInit(): void {
  }

  delete(): void {
    this.deleteEvent.emit(this.caseDetails);
  }

}

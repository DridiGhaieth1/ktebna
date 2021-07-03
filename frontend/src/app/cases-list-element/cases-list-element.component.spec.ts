import {ComponentFixture, TestBed} from '@angular/core/testing';

import {CasesListElementComponent} from './cases-list-element.component';

describe('CasesListElementComponent', () => {
  let component: CasesListElementComponent;
  let fixture: ComponentFixture<CasesListElementComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [CasesListElementComponent]
    })
      .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CasesListElementComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

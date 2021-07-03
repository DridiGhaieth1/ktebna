import {NgModule} from '@angular/core';
import {RouterModule, Routes} from '@angular/router';
import {CasesComponent} from './cases/cases.component';
import {CasesDetailsComponent} from './cases-details/cases-details.component';
import {AddCasesComponent} from './add-cases/add-cases.component';
import {EditCasesComponent} from './edit-cases/edit-cases.component';
import {CasesStatComponent} from './cases-stat/cases-stat.component';
import {CasesListComponent} from './cases-list/cases-list.component';

// todo: (routing) Configurez les routes et liens nécessaires à votre application
const routes: Routes = [
  {path: '',  component: CasesComponent, pathMatch: 'full'},
  {
    path: 'cases',
    component: CasesComponent,
    data: {title: 'List of Cases'}
  },
  // todo: (routing) Vous devez exploiter au moins une route paramétrée
  {
    path: 'cases-details/:id',
    component: CasesDetailsComponent,
    data: {title: 'Cases Details'}
  },
  {
    path: 'add-cases',
    component: AddCasesComponent,
    data: {title: 'Add Cases'}
  },
  {
    path: 'edit-cases/:id',
    component: EditCasesComponent,
    data: {title: 'Edit Cases'}
  },
  {
    path: 'cases-stat',
    component: CasesStatComponent,
    data: {title: 'Cases Statistic'}
  },
  {
    path: 'cases-list',
    component: CasesListComponent,
    data: {title: 'Cases List'}
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {
}

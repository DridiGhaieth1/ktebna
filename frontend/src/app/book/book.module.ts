import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { BookRoutingModule } from './book-routing.module';
import {HttpClientModule} from '@angular/common/http';
import {FormsModule} from '@angular/forms';
import { DetailsComponent } from './details/details.component';
import { CreateComponent } from './create/create.component';
import { UpdateComponent } from './update/update.component';
import { BookHomeComponent } from './book-home/book-home.component';
import { Ng2SearchPipeModule } from 'ng2-search-filter';

@NgModule({
  declarations: [
    DetailsComponent,
    CreateComponent,
    UpdateComponent,
    BookHomeComponent
  ],
  exports: [
    BookHomeComponent
  ],
  imports: [
    CommonModule,
    BookRoutingModule,
    HttpClientModule,
    FormsModule,
    Ng2SearchPipeModule
  ]
})
export class BookModule { }

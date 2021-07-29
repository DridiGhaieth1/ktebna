import { Injectable } from '@angular/core';
import {Author} from '../model/author';
import { HttpHeaders } from '@angular/common/http';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs';
import {catchError, retry, tap} from 'rxjs/operators';

const httpOptions = {headers: new HttpHeaders({"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8", }) };
@Injectable({
  providedIn: 'root'
})

export class AuteurService {
  url = 'http://backend.ktebna.tn/author/add';


  constructor(private http: HttpClient) { }


  postAuthor(c: Author): Observable<any>{
    return this.http.post<Author>(this.url, c);
  }
  getAuthor(): Observable<Author[]> {
    return this.http.get<Author[]>('http://backend.ktebna.tn/author/get');
  }
}

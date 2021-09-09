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
    const headers = { 'content-type': 'application/json'};
    const body = JSON.stringify(c);
    console.log(JSON.stringify(c));
    return this.http.post<Author>('http://backend.ktebna.tn/api/authors', body,{'headers' : headers});
  }
  getAuthor(): Observable<Author[]> {
    return this.http.get<Author[]>('http://backend.ktebna.tn/api/authors');
  }
  deleteAuthor(id: any): Observable<any> {
    return this.http.delete(`http://backend.ktebna.tn/author/${id}/delete`);
  }
  updateAuthor(data: any): Observable<any>{
    const headers = { 'content-type': 'application/json'};
    const body = JSON.stringify(data);
    console.log(JSON.stringify(data));
    return this.http.put(`http://backend.ktebna.tn/api/authors/${data.id}`, data);
  }
  getById(id: any): Observable<any>{
  return this.http.get(`http://backend.ktebna.tn/api/authors/${id}`);
}
}

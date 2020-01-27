import { Component } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
	title='Mengao!';
  	constructor() {}
  	dadosPost:object = {
  	name: 'João',
  	title:'Otimo episodio',
  	text: 'sdlkfjasiocnaosicdbauiscdbiasudhasuio',
  	likes: 0,
  	dislikes: 1,
  	reacted: false, 
  	episode:{
  		serie: 'Sei la',
  		number: 1, 
  	},
  	comment:{
  		userName: 'Lol',
  		text: 'sdfhsdocvnjioasdcnklfhio',
  	}
  };
  	like(dadosPost){
  		if (this.dadosPost.reacted) {
  			dadosPost.likes--;

  		}
  		else{
  			dadosPost.likes++;
  		}
  		dadosPost.reacted = !(dadosPost.reacted);
  	}

}
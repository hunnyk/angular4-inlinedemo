import {Component, OnInit} from '@angular/core';
import {MyserviceService} from "./myservice.service";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit{
  data: any;

  constructor(private myserv:MyserviceService) {}

  ngOnInit(): void {
    this.getAllRegisters();
  }

  getAllRegisters(){
       this.myserv.getAllReg().subscribe(data => {
         this.data = data;
       })
    }

  saveRegisters(event){
    let data = {
        "reg_name": event.newData.reg_name,
        "reg_email": event.newData.reg_email,
      };
    this.myserv.saveReg(data).subscribe((res)=>{
      event.confirm.resolve(event.newData);
    });
  }

  deleteRegisters(event){
    this.myserv.deleteReg(event.data).subscribe((res)=>{
         event.confirm.resolve(event.source.data);
    });
  }

  updateRegisters(event) {
    var data = {"reg_name" : event.newData.reg_name,
      "reg_email" : event.newData.reg_email,
      "reg_id":event.newData.reg_id
    };

    this.myserv.updateReg(data).subscribe((res)=>{
      event.confirm.resolve(event.newData);
    })

  }

  settings = {
    add:{
      confirmCreate:true
    },
    delete:{
      confirmDelete:true
    },
    edit:{
      confirmSave:true
    },
    columns: {
      reg_name: {
        title: 'Name'
      },
      reg_email: {
        title: 'Email'
      }
    }
  };

}

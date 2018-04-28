import {Injectable} from "@angular/core";
import {HttpClient} from "@angular/common/http";

@Injectable()
export class MyserviceService{
  constructor(private http:HttpClient) {}

  data:any = [];

  getAllReg() {
    return this.http.get("http://localhost/phpapi/smart/smart_api.php?action=getall");
  }

  saveReg(data){
    return this.http.post("http://localhost/phpapi/smart/smart_api.php?action=save",data)
  }

  deleteReg(data){
    return this.http.delete("http://localhost/phpapi/smart/smart_api.php?action=delete&id="+data.reg_id);
  }

  updateReg(data){
    console.log(data.reg_id);
    return this.http.put("http://localhost/phpapi/smart/smart_api.php?action=edit&id="+data.reg_id,data)
  }
}

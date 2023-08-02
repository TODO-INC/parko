# from fastapi import FastAPI,Request,Depends,Form,File,UploadFile
# from fastapi.templating import Jinja2Templates
# from fastapi.staticfiles import StaticFiles
# from fastapi.responses import RedirectResponse,JSONResponse
# from database import SessionLocal
# import uuid,shutil
# from fastapi.encoders import jsonable_encoder
# from sqlalchemy.orm import Session
# from datetime import datetime
# import model as model
# import io

# current_date_time=datetime.utcnow()

# app=FastAPI()
# templates = Jinja2Templates(directory='frontend/host/templates')
# app.mount("/frontend/host", StaticFiles(directory="frontend/host"), name="host")

# def get_db():
#     db = None
#     try:
#         db = SessionLocal()
#         yield db
#     finally:
#         db.close()
# #get booking page
# @app.get('/get_home')
# def getbooking(request:Request,db:Session = Depends(get_db)):
    
#     return templates.TemplateResponse("host/templates/index.php",context={"request":request,})

# # #get signup apge
# # @app.get('/signup_form')
# # def getsinup(request:Request,db:Session = Depends(get_db)):
# #     return templates.TemplateResponse("/login/signup.html",context={"request":request})

# # #get signup apge
# # @app.get('/cla_info')
# # def getsinup(request:Request,db:Session = Depends(get_db)):
# #     return templates.TemplateResponse("/login/cous.html",context={"request":request})

# # #get signup apge
# # @app.get('/emp_view')
# # def getsinup(request:Request,db:Session = Depends(get_db)):
# #     x=db.query(model.sales).filter(model.sales.status=="ACTIVE").all()
# #     return templates.TemplateResponse("/login/emptb.html",context={"request":request,"data":x})

# # # employee login check
# # @app.post('/check')
# # def check_info(request:Request,db:Session = Depends(get_db),name:str=Form(...),password:str=Form(...)):
# #     check=db.query(model.employee).filter(model.employee.username==name,model.employee.password==password,model.employee.status =="ACTIVE").first()
# #     if check is None:
# #         return templates.TemplateResponse("/login/cous.html",context={"request":request})
# #     else:
# #         return RedirectResponse("/get_booking",status_code=303)

# # @app.post('/cous_info')
# # def order_info(request:Request,db:Session =Depends(get_db),name:str=Form(...),pno:str=Form(...)):
# #     s="ACTIVE"
# #     body=model.sales(cous_name=name,cous_pno=pno,Total_cost=0,Deshies_name=" ",Deshies_quantity=" ",status=s)
# #     db.add(body)
# #     db.commit()
# #     global k
# #     k=db.query(model.sales).filter(model.sales.cous_name==name,model.sales.cous_pno==pno,model.sales.status=="ACTIVE").first()
# #     print(k)
# #     return templates.TemplateResponse("/login/order.html",context={"request":request,"data":k})


# # @app.post('/Deshies_info')
# # def order_info(request:Request,db:Session = Depends(get_db),id:int=Form(...),d_name:str=Form(...),d_quantity:int=Form(...)):
# #     find=db.query(model.menu).filter(model.menu.Deshies_name==d_name,model.menu.status=="ACTIVE").first()
# #     tot_cost=(find.Deshies_cost)*d_quantity
# #     h=db.query(model.sales).filter(model.sales.id==id).first()
# #     con_dname=(h.Deshies_name) + " " + d_name
# #     con_dq=(h.Deshies_quantity) + " " + str(d_quantity)
# #     ans=(h.Total_cost)+tot_cost
# #     db.query(model.sales).filter(model.sales.id==id,model.sales.status=="ACTIVE").update({"Deshies_name":con_dname,"Deshies_quantity":con_dq,"Total_cost":ans})
# #     db.commit()
# #     return templates.TemplateResponse("/login/order.html",context={"request":request,"data":k})


from fastapi import FastAPI, Request, Depends
from fastapi.responses import HTMLResponse
from fastapi.templating import Jinja2Templates
from sqlalchemy.orm import Session
from database import SessionLocal  # Assuming you have defined SessionLocal in database.py
from fastapi.staticfiles import StaticFiles

app = FastAPI()
templates = Jinja2Templates(directory='frontend/host/templates')
app.mount("/frontend/host", StaticFiles(directory="frontend/host"), name="host")


def get_db():
    db = None
    try:
        db = SessionLocal()
        yield db
    finally:
        db.close()

@app.get('/get_home')
def get_booking(request: Request, db: Session = Depends(get_db)):
    return templates.TemplateResponse("index.php", context={"request": request})


from fastapi import FastAPI,Form, Request, Depends,File,UploadFile,Header
from fastapi.responses import HTMLResponse, JSONResponse
from fastapi.templating import Jinja2Templates
from sqlalchemy.orm import Session
from database import SessionLocal  # Assuming you have defined SessionLocal in database.py
from fastapi.staticfiles import StaticFiles
from datetime import datetime ,timedelta
import model as model
from fastapi.responses import RedirectResponse
from fastapi import FastAPI, Depends
from fastapi.encoders import jsonable_encoder
from typing import Dict,List, Union,Optional
import os
import shutil
import uuid
import json

current_date_time=datetime.utcnow()
app = FastAPI()

# Templates for the frontend/host directory
templates = Jinja2Templates(directory='frontend/host/templates')
app.mount("/frontend/host", StaticFiles(directory="frontend/host"), name="host")

# Templates for the frontend/adminpanel directory
admin_templates = Jinja2Templates(directory='frontend/adminpanel/templates')
app.mount("/frontend/adminpanel", StaticFiles(directory="frontend/adminpanel"), name="adminpanel")


def get_db():
    db = None
    try:
        db = SessionLocal()
        yield db
    finally:
        db.close()

@app.get('/get_home/{user_id}')
def get_booking(user_id:str,request: Request, db: Session = Depends(get_db)):
    current_date_now=current_date_time
    datee=current_date_now.date()
    print(datee)
    print(user_id)
    user_data = db.query(model.host).filter(model.host.user_id==user_id).all()
    l=[]
    for i in user_data:
         l.append(i.host_id) 
    print(l)
    data=[]
    for i in l:
        user_data1 = db.query(model.register).filter(model.register.host_id==i).all()
        data.append(user_data1)
    print(data)
    return templates.TemplateResponse("index.php", context={"request": request,"data":data,"date":datee,"current_user":user_id})


@app.get('/get_account/{user_id}')
def get_user_account(user_id: str, request: Request, db: Session = Depends(get_db)):
    return templates.TemplateResponse("account.php", context={"request": request,"current_user":user_id})


@app.get('/get_notification/{user_id}')
def get_user_notification(user_id: str, request: Request, db: Session = Depends(get_db)):
    return templates.TemplateResponse("notification.php", context={"request": request,"current_user":user_id})



@app.get('/get_help/{user_id}')
def get_user_help(user_id: str, request: Request, db: Session = Depends(get_db)):
    return templates.TemplateResponse("help.php", context={"request": request,"current_user":user_id})


@app.get('/get_about/{user_id}')
def get_user_help(user_id: str, request: Request, db: Session = Depends(get_db)):
    return templates.TemplateResponse("about.php", context={"request": request,"current_user":user_id})


@app.get('/get_map/{user_id}')
def get_booking(user_id:str,request: Request, db: Session = Depends(get_db)):
    return templates.TemplateResponse("map.php", context={"request": request,"current_user":user_id})




@app.get('/get_profile/{user_id}')
def get_booking(user_id:str,request: Request, db: Session = Depends(get_db)):
    return templates.TemplateResponse("profile.php", context={"request": request,"current_user":user_id})



@app.get('/get_developers')
def get_booking(request: Request, db: Session = Depends(get_db)):
    return templates.TemplateResponse("developers.php", context={"request": request})

@app.get('/')
def get_booking(request: Request, db: Session = Depends(get_db)):
    return admin_templates.TemplateResponse("auth.php", context={"request": request})


@app.get('/get_listing/{user_id}')
def get_booking(user_id:str,request: Request, db: Session = Depends(get_db)):
    new_user = db.query(model.host).filter(model.host.status=="ACTIVE").all()
    return templates.TemplateResponse("listing.php", context={"request": request , "data":new_user,"current_user":user_id})




@app.post('/post_parkin/{user__id}')
def create_data(user__id:str,request: Request, db: Session = Depends(get_db), id:int=Form(...)):
    l=1
    print(id)
    print("yogaaaaaa")
    updated_at=current_date_time
    db.query(model.register).filter(model.register.id==id).update({"updated_at":updated_at,"booking_status":l})
    db.commit()
    error = user__id
    json_compatible_item_data = jsonable_encoder(error)
    return JSONResponse(content=json_compatible_item_data)

@app.post('/post_parkout/{user__id}')
def create_data(user__id:str,request: Request, db: Session = Depends(get_db), id:int=Form(...)):
    l=2
    print(id)
    print("yogaaaaaa")
    updated_at=current_date_time
    db.query(model.register).filter(model.register.id==id).update({"updated_at":updated_at,"booking_status":l})
    db.commit()
    error = user__id
    json_compatible_item_data = jsonable_encoder(error)
    return JSONResponse(content=json_compatible_item_data)


@app.post('/post_signup')
def create_data(request:Request,db:Session=Depends(get_db),name:str=Form(...),email:str=Form(...),phoneno:str=Form(...),password:str=Form(...)):
    statuss="ACTIVE"
    hostt="NO"
    created_at = current_date_time
    updated=" "
    # body=model.sign_up(name=s_name,email=s_email,phoneno=s_phone,password=user_password,status=statuss,created_at=created_at)
    find=db.query(model.sign_up).filter(model.sign_up.email==email,model.sign_up.status =="ACTIVE").first()
    if find is None:
            find1=db.query(model.sign_up).filter(model.sign_up.status=="ACTIVE").all()
            user_counter = 1
            for i in find1:
                 user_counter+=1
    
    # Create the user ID in the format "userX" where X is the value of the counter
            user_id = f"user{user_counter}"
            body=model.sign_up(name=name,user_id=user_id,email=email,phoneno=phoneno,password=password,host_user=hostt,status=statuss,created_at=created_at,updated_at=updated)
            db.add(body)
            db.commit()
            error = user_id
            json_compatible_item_data = jsonable_encoder(error)
            return JSONResponse(content=json_compatible_item_data)
    else:
            error = "Already this name Exist"
            json_compatible_item_data = jsonable_encoder(error)
            return JSONResponse(content=json_compatible_item_data)
# current_user="yy"


@app.post('/post_login')
def create_data(request: Request, db: Session = Depends(get_db), l_email: str = Form(...), l_password: str = Form(...)):
    user = db.query(model.sign_up).filter(model.sign_up.email == l_email, model.sign_up.password == l_password ,model.sign_up.status =="ACTIVE").first() 
    if user is None:
            error = "Not in database"
            json_compatible_item_data = jsonable_encoder(error)
            return JSONResponse(content=json_compatible_item_data)
    else:
            error = user.user_id
            json_compatible_item_data = jsonable_encoder(error)
            return JSONResponse(content=json_compatible_item_data)
host_counter = 0  
 
@app.post('/post_host_data/{user_id}')
def create_data(user_id:str,request: Request, db: Session = Depends(get_db), userType: str = Form(...),userhours: str = Form(...), spaceName: str = Form(...), spaceSize: int = Form(...),spaceDesc: str = Form(...),  spaceAddress: str = Form(...), spaceCity: str = Form(...), spacePincode: int = Form(...), coordinates_container: str = Form(...), spaceLength: int = Form(...), spaceWidth: int = Form(...),totalCar: int = Form(...),totalBike: int = Form(...), spaceSurvey: str = Form(...), spaceAdhar: int = Form(...), spaceFileMultiple1: UploadFile = File(...),spaceFileMultiple2: UploadFile = File(...),spaceFileMultiple3: UploadFile = File(...),spaceFileMultiple4: UploadFile = File(...), dropdownMenuButton: List[str] = Form(...), subscriptionUser: str = Form(...), currentUser: str = Form(...), spaceInstructions: str = Form(...)):
    statuss = "ACTIVE"
    find1=db.query(model.host).filter(model.host.status=="ACTIVE").all()
    user_counter = 1
    for i in find1:
        user_counter+=1
    

# Create the user ID in the format "userX" where X is the value of the counter
    host__id = f"host{user_counter}"
    created_at = current_date_time
    file_type=spaceFileMultiple1.content_type
    ext=file_type.split('/')[-1]
    image1=str(uuid.uuid4())+ '.' + str(ext)
    file_loc=f"frontend/host/uploadimage/{image1}"
    with open(file_loc,"wb+") as file_view:
        shutil.copyfileobj(spaceFileMultiple1.file,file_view)

    file_type=spaceFileMultiple2.content_type
    ext=file_type.split('/')[-1]
    image2=str(uuid.uuid4())+ '.' + str(ext)
    file_loc=f"frontend/host/uploadimage/{image2}"
    with open(file_loc,"wb+") as file_view:
        shutil.copyfileobj(spaceFileMultiple2.file,file_view)

    file_type=spaceFileMultiple3.content_type
    ext=file_type.split('/')[-1]
    image3=str(uuid.uuid4())+ '.' + str(ext)
    file_loc=f"frontend/host/uploadimage/{image3}"
    with open(file_loc,"wb+") as file_view:
        shutil.copyfileobj(spaceFileMultiple3.file,file_view)

    file_type=spaceFileMultiple4.content_type
    ext=file_type.split('/')[-1]
    image4=str(uuid.uuid4())+ '.' + str(ext)
    file_loc=f"frontend/host/uploadimage/{image4}"
    with open(file_loc,"wb+") as file_view:
        shutil.copyfileobj(spaceFileMultiple4.file,file_view)
    
    updated_at=current_date_time
    hostt="YES"
    # test=[1,2,3,4]
   # db.query(model.sign_up).filter(model.sign_up.user_id==cc_user).update({"updated_at":updated_at,"host_user":hostt})
    body = model.host(
        userType=userType,
        namespaceName=spaceName,
        spaceSize=spaceSize,
        spaceAddress=spaceAddress,
        spaceCity=spaceCity,
        spacePincode=spacePincode,
        coordinates_container=coordinates_container,
        spaceLength=spaceLength,
        spaceWidth=spaceWidth,
        spaceSurvey=spaceSurvey,
        spaceAdhar=spaceAdhar,
        spaceFileMultiple1=image1,
        spaceFileMultiple2=image2,
        spaceFileMultiple3=image3,
        spaceFileMultiple4=image4, 
        subscriptionUser=subscriptionUser,
        dropdownMenuButton=jsonable_encoder(dropdownMenuButton),
        currentUser=currentUser,
        host_id=host__id,
        user_id=user_id,
        spaceInstructions=spaceInstructions,
        userhours=userhours,
        spaceDesc=spaceDesc,
        totalCar=totalCar,
        totalBike=totalBike,
        status=statuss,
        created_at=created_at
    )

    db.add(body)

    # Add the dropdownMenuButton options one by one


    db.commit()
    new_c = db.query(model.host).filter(model.host.host_id==host__id).first()

    db.query(model.sign_up).filter(model.sign_up.user_id==new_c.user_id).update({"updated_at":updated_at,"host_user":hostt})
    db.commit()
    return RedirectResponse(f"/get_listing/{user_id}", status_code=303)

    # error = "Done"
    # json_compatible_item_data = jsonable_encoder(error)
    # return JSONResponse(content=json_compatible_item_data)



#---------------------------------------------------user---TO---host--------------------------------------------------------------------------

# @app.post('/post_host_change')
# def create_data(request: Request, db: Session = Depends(get_db)):
#     print("yyogaaaa")
#     updated_at=current_date_time
#     hostt="YES"
#     db.query(model.sign_up).filter(model.sign_up.user_id==current_user).update({"updated_at":updated_at,"host_user":hostt})
#     error = "Done"
#     json_compatible_item_data = jsonable_encoder(error)
#     return JSONResponse(content=json_compatible_item_data)



#-----------------------------------------------------------user-------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------------------------------------------------------


user_templates = Jinja2Templates(directory='frontend/user/templates')
app.mount("/frontend/user", StaticFiles(directory="frontend/user"), name="user")


@app.get('/get_user_home/{user_id}')
def get_booking(user_id:str,request: Request, db: Session = Depends(get_db)):
    host_data = db.query(model.host).filter(model.host.status=="ACTIVE").all()
    user_data= db.query(model.sign_up).filter(model.sign_up.user_id==user_id).first()
    return user_templates.TemplateResponse("index.php", context={"request": request,"data":host_data,"current_user":user_id,"name":user_data})


@app.get('/get_search_city/{user_id}/')
def get_user_search(user_id: str, request: Request, db: Session = Depends(get_db)):
    name1 = request.query_params.get("searchSpace")
    user_data = db.query(model.host).filter(model.host.spaceCity == name1, model.register.status == "ACTIVE").all()
    user_data1= db.query(model.sign_up).filter(model.sign_up.user_id==user_id).first()
    return user_templates.TemplateResponse(
        "index.php",
        context={"request": request, "data": user_data, "current_user": user_id, "searched_city": name1,"name":user_data1}
    )

@app.post('/post_user_filter/{user_id}')
def create_data(user_id: str, request: Request, db: Session = Depends(get_db), l_email: str = Form(...), l_password: str = Form(...)):
    user = db.query(model.sign_up).filter(model.sign_up.email == l_email, model.sign_up.password == l_password ,model.sign_up.status =="ACTIVE").first() 

@app.get('/get_user_booking/{user_id}')
def get_user_booking(user_id: str, request: Request, db: Session = Depends(get_db)):
    user_data = db.query(model.register).filter(model.register.user_id==user_id,model.register.status=="ACTIVE").all()
    return user_templates.TemplateResponse("booking.php", context={"request": request,"data":user_data,"current_user":user_id})



@app.get('/get_user_account/{user_id}')
def get_user_account(user_id: str, request: Request, db: Session = Depends(get_db)):
    return user_templates.TemplateResponse("account.php", context={"request": request,"current_user":user_id})


@app.get('/get_user_notification/{user_id}')
def get_user_notification(user_id: str, request: Request, db: Session = Depends(get_db)):
    return user_templates.TemplateResponse("notification.php", context={"request": request,"current_user":user_id})



@app.get('/get_user_help/{user_id}')
def get_user_help(user_id: str, request: Request, db: Session = Depends(get_db)):
    return user_templates.TemplateResponse("help.php", context={"request": request,"current_user":user_id})


@app.get('/get_user_about/{user_id}')
def get_user_help(user_id: str, request: Request, db: Session = Depends(get_db)):
    return user_templates.TemplateResponse("about.php", context={"request": request,"current_user":user_id})


@app.get('/get_user_reserve/{id}/{user_id}')
def get_booking(id: int, user_id: str, request: Request, db: Session = Depends(get_db)):
    print(id)
    
    user_data = db.query(model.host).filter(model.host.id == id).first()
    print(user_data)
    
    if not user_data:
        return {"error": "User data not found"}
    
    amenities = user_data.dropdownMenuButton

    # Check if amenities is already a list, if not, attempt to parse it
    if isinstance(amenities, str):
        try:
            amenities_list = json.loads(amenities)
        except json.JSONDecodeError:
            return {"error": "Failed to decode JSON from amenities"}
    elif isinstance(amenities, list):
        amenities_list = amenities
    else:
        return {"error": "Unexpected format for amenities"}

    amenity_svg_mapping = {
        "Security Camera": "cctv.png",
        "Dust Free Zone": "dust.png",
        "Free Air": "air.png",
        "E-Vehicle Charge Point": "wash.png",
        "Locker Facility": "vault.png",
        # Add more entries for other amenities
    }

    user_data1 = db.query(model.sign_up).filter(model.sign_up.user_id == user_data.user_id).first()
    
    return user_templates.TemplateResponse("reserve.php", context={
        "request": request,
        "data": user_data,
        "data1": user_data1,
        "data2": amenities_list,
        "data3": amenity_svg_mapping,
        "data4": user_id
    })







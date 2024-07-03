from sqlalchemy.schema import Column
from sqlalchemy.types import String, Integer, Date, BLOB, BigInteger, DATETIME, ARRAY,JSON,Float
from database import base,db_engine

class sign_up(base):
    __tablename__ = "signup"
    
    id = Column(Integer, primary_key=True,index=True)
    user_id = Column(String(30))
    name = Column(String(30))
    email = Column(String(30))
    phoneno = Column(String(30))
    password= Column(String(30))
    host_user = Column(String(10))
    status = Column(String(30))
    wallet = Column(Float)
    created_at=Column(String(30))
    updated_at=Column(String(30))

class host(base):
    __tablename__ = "host_details"

    id = Column(Integer, primary_key=True,index=True)
    userType = Column(String(30))
    namespaceName = Column(String(30))
    spaceSize = Column(Integer)
    spaceAddress = Column(String(300))
    spaceCity = Column(String(30))
    spacePincode = Column(Integer)
    coordinates_container = Column(String(30))
    spaceLength = Column(Integer)
    spaceWidth = Column(Integer)
    spaceSurvey = Column(String(30))
    spaceAdhar = Column(Integer)
    spaceFileMultiple1 = Column(String(130))
    spaceFileMultiple2 = Column(String(130))
    spaceFileMultiple3 = Column(String(130))
    spaceFileMultiple4 = Column(String(130))
    dropdownMenuButton = Column(JSON)
    subscriptionUser = Column(String(30))
    currentUser = Column(String(30))
    spaceInstructions = Column(String(300))
    host_id = Column(String(30))
    user_id = Column(String(30))
    status = Column(String(30))
    created_at=Column(String(30))
    income = Column(Float)
    userhours  = Column(String(50))
    spaceDesc  = Column(String(300))
    totalCar = Column(Integer)
    totalBike = Column(Integer)



class register(base):
    __tablename__ = "park_reg"
    
    id = Column(Integer, primary_key=True,index=True)
    user_id = Column(String(30))
    host_id = Column(String(30))
    vehicleType = Column(String(30))
    startDate = Column(Date)
    startTime = Column(DATETIME)
    endDate= Column(Date)
    endTime = Column(DATETIME)
    cost  = Column(Float)
    booking_status = Column(String(30))
    status = Column(String(30))
    created_at=Column(String(30))
    updated_at=Column(String(30))
    rating=Column(String(30))
    review=Column(String(300))
    vehicleNumber=Column(String(30))



        
base.metadata.create_all(bind=db_engine)

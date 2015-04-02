module Kernel
  def to_y(object) 
    object.to_yaml
  end
  
  def ry(object) 
    raise object.to_yaml
  end
  
  def ri(object) 
    raise object.inspect
  end

  def py(object) 
     "<pre>#{object.to_yaml}</pre>"
  end
  
  def ra(object) 
    a = [] 
    a << "Should show: object.inspect, object.to_yaml, object.to_s"
    a << "object.inspect =>"
    a << object.inspect
    a << "**********************************************************"
    a << "object.to_yaml =>"
    begin  
      a << object.to_yaml
    rescue Exception => e  
      a << "Erro no object.to_yaml " + e.message  
    end      
    a << "**********************************************************"
    a << "object.to_s =>"
    a << object.to_s
    a << "**********************************************************"
    raise a.inspect
  end
  
end
class RoomsController < ApplicationController

  def index
    @rooms = Room.where(:public => true).order("created_at DESC").limit(25)
    @new_room = Room.new
  end
  
  def create
    config_opentok
    session = @opentok.create_session request.remote_addr
    params[:room][:sessionId] = session.session_id

    @new_room = Room.new(params[:room])

    respond_to do |format|
      if @new_room.save
        format.html { redirect_to("/party/"+@new_room.id.to_s) }
      else
        format.html { render :controller => 'rooms', :action => "index" }
      end
    end
  end
  
  def party
    @room = Room.find(params[:id])
    
    config_opentok
    
    @tok_token = @opentok.generate_token :session_id => @room.sessionId 
  end
  
  private
  
  def config_opentok 
    if @opentok.nil? 
      @opentok = OpenTok::OpenTokSDK.new 366872, "29b7411c6858482c4cfa2f53df5c0942b12412a3" 
    end 
  end
end

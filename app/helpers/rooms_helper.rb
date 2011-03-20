require 'date'

module RoomsHelper

  def start_diff(date)
    intervals = [["day", 1], ["hour", 24], ["minute", 60], ["second", 60]]
    elapsed = DateTime.now - DateTime.parse(date.to_s)
    #tense = elapsed > 0 ? "since" : "until"
    #event = elapsed > 0 ? "the Video Party started" : "the Video Party starts"
    interval = 1.0
    parts = intervals.collect do |name, new_interval|
      interval /= new_interval
      number, elapsed = elapsed.abs.divmod(interval)
    "#{number.to_i} #{name}#{"s" unless number == 1}"
    end
    "#{parts.join(", ")} ago."
  end


end

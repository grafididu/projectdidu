from models.ticket_booking_app import TicketBookingApp
import tkinter as tk

def main():
    root = tk.Tk()
    app = TicketBookingApp(root)
    root.mainloop()

if __name__ == "__main__":
    main()
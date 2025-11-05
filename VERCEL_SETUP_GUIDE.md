# 📧 Contact Form Setup Guide for Vercel

## 🎯 Overview
Since Vercel doesn't support PHP, I've provided **3 solutions**. Choose the one that works best for you:

---

## ✅ OPTION 1: Vercel Serverless Function (Current Implementation)

### What You Need:
1. Node.js installed locally (for testing)
2. An email service (choose one):
   - **Gmail** (easiest for testing)
   - **SendGrid** (recommended, free tier available)
   - **Resend** (best for Vercel, has free tier)

### Setup Steps:

#### Step 1: Install Dependencies
```bash
cd /Users/mac/Documents/development/serene-new
npm install
```

#### Step 2: Choose Email Service

**🔹 For Gmail (Easiest):**
1. Go to your Google Account settings
2. Enable 2-Factor Authentication
3. Generate an App Password: https://myaccount.google.com/apppasswords
4. Create a `.env` file in the root directory:
```
SMTP_HOST=smtp.gmail.com
SMTP_PORT=587
SMTP_USER=your-email@gmail.com
SMTP_PASS=your-app-specific-password
```

**🔹 For SendGrid (Recommended):**
1. Sign up at https://sendgrid.com (free tier: 100 emails/day)
2. Get API key from Settings > API Keys
3. Update `/api/contact.js`:
   - Comment out the Nodemailer section (lines with SMTP)
   - Uncomment the SendGrid section
4. Install SendGrid: `npm install @sendgrid/mail`
5. Add to `.env`:
```
SENDGRID_API_KEY=your_sendgrid_api_key
```

**🔹 For Resend (Best for Vercel):**
1. Sign up at https://resend.com (free tier: 100 emails/day)
2. Get API key
3. Update `/api/contact.js`:
   - Comment out the Nodemailer section
   - Uncomment the Resend section
4. Install Resend: `npm install resend`
5. Add to `.env`:
```
RESEND_API_KEY=your_resend_api_key
```

#### Step 3: Deploy to Vercel

**Via Vercel Dashboard:**
1. Push your code to GitHub
2. Go to https://vercel.com
3. Import your repository
4. Add Environment Variables:
   - Go to Settings > Environment Variables
   - Add your SMTP/API keys (from `.env`)
5. Deploy!

**Via Vercel CLI:**
```bash
npm i -g vercel
vercel login
vercel
```

#### Step 4: Add Environment Variables to Vercel
```bash
vercel env add SMTP_HOST
vercel env add SMTP_PORT
vercel env add SMTP_USER
vercel env add SMTP_PASS
```

---

## ✅ OPTION 2: Third-Party Form Service (Easiest - No Code!)

If you want zero backend code, use a form service:

### 🔹 Web3Forms (Recommended - Free & Simple)

1. Sign up at https://web3forms.com
2. Get your Access Key
3. Update the contact form in `contact-us/index.html`:

```html
<!-- Replace the current form with this -->
<form action="https://api.web3forms.com/submit" method="POST" id="contact-form">
  <input type="hidden" name="access_key" value="YOUR_ACCESS_KEY_HERE">
  <input type="hidden" name="redirect" value="https://yourdomain.com/contact-us/?success=1">
  <input type="hidden" name="subject" value="New Contact Form Submission">
  <input type="hidden" name="from_name" value="Serene Touch Website">
  
  <!-- Your existing form fields -->
  <input type="text" name="name" placeholder="Full Name" required>
  <input type="email" name="email" placeholder="Email Address" required>
  <input type="text" name="phone" placeholder="Phone Number">
  <input type="text" name="subject" placeholder="Subject">
  <textarea name="message" placeholder="Message" required></textarea>
  
  <button type="submit">Send Message</button>
</form>
```

**Benefits:**
- ✅ No server code needed
- ✅ Free tier: 250 submissions/month
- ✅ Email notifications included
- ✅ Spam protection built-in

### 🔹 Formspree (Alternative)

1. Sign up at https://formspree.io
2. Create a new form
3. Get your form endpoint
4. Update form action to: `https://formspree.io/f/YOUR_FORM_ID`

---

## ✅ OPTION 3: EmailJS (Frontend Only)

Send emails directly from the browser:

1. Sign up at https://www.emailjs.com (free: 200 emails/month)
2. Create an email template
3. Get your credentials
4. Install EmailJS: `npm install @emailjs/browser`
5. Update the JavaScript in `contact-us/index.html`

---

## 🧪 Testing

### Local Testing:
```bash
npm run dev
# Visit http://localhost:3000/contact-us
```

### Test the API directly:
```bash
curl -X POST http://localhost:3000/api/contact \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Test User",
    "email": "test@example.com",
    "message": "Test message"
  }'
```

---

## 🔧 Troubleshooting

### "Module not found" Error
```bash
npm install
```

### Emails Not Sending
1. Check Vercel logs: `vercel logs`
2. Verify environment variables are set in Vercel dashboard
3. Check email service quotas

### CORS Errors
- Make sure API route is in `/api` folder
- Vercel automatically handles CORS for API routes

---

## 📊 Comparison Table

| Solution | Difficulty | Monthly Cost | Emails/Month | Setup Time |
|----------|-----------|--------------|--------------|------------|
| **Vercel + Gmail** | Medium | Free | ~500 | 15 min |
| **Vercel + SendGrid** | Medium | Free | 100 | 20 min |
| **Web3Forms** | Easy | Free | 250 | 5 min |
| **Formspree** | Easy | Free | 50 | 5 min |
| **EmailJS** | Medium | Free | 200 | 10 min |

---

## 🎯 My Recommendation

**For Quick Setup:** Use **Web3Forms** (Option 2) - literally 5 minutes

**For Full Control:** Use **Vercel + SendGrid** (Option 1) - more professional

---

## 📝 Files Created

- `/api/contact.js` - Serverless function for handling emails
- `/package.json` - Node.js dependencies
- `/vercel.json` - Vercel configuration
- `/env.example` - Environment variable template
- `contact-us/index.html` - Updated with fetch API

---

## 🆘 Need Help?

1. Check Vercel deployment logs
2. Test API endpoint: `https://yourdomain.com/api/contact`
3. Verify environment variables are set
4. Check email service status

---

## 🚀 Quick Start (Web3Forms - Easiest)

1. Go to https://web3forms.com
2. Get your access key
3. Replace form action in HTML
4. Done! No deployment needed.


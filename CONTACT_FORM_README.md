# Contact Form Implementation

## ⚠️ UPDATED FOR VERCEL

The contact form has been updated to work with **Vercel** (serverless platform).

**PHP doesn't work on Vercel**, so we've implemented modern solutions.

## 📂 Files Created/Modified

### New Files:

1. **`/api/contact.js`** - Vercel serverless function for sending emails
2. **`package.json`** - Node.js dependencies for the serverless function
3. **`vercel.json`** - Vercel configuration
4. **`env.example`** - Environment variables template
5. **`contact-form-web3forms.html`** - Alternative form using Web3Forms (no backend!)
6. **`VERCEL_SETUP_GUIDE.md`** - Complete setup instructions
7. **`QUICK_START.md`** - Quick start guide

### Modified Files:

1. **`contact-us/index.html`** - Updated to use fetch API and serverless function

## Form Fields

The form collects the following information:

- **Name** (required)
- **Email** (required)
- **Phone** (optional)
- **Subject** (optional)
- **Message** (required)

## 🚀 Two Solutions Provided

### ⚡ Option 1: Web3Forms (EASIEST - 5 minutes)

**Perfect for:** Quick setup, no backend configuration

- Sign up at https://web3forms.com (free)
- Get Access Key
- Use the form in `contact-form-web3forms.html`
- Free tier: 250 emails/month
- **No environment variables needed!**

### 🔧 Option 2: Vercel Serverless Function (20 minutes)

**Perfect for:** Full control over email delivery

- Choose email service: Gmail, SendGrid, or Resend
- Configure environment variables
- Deploy to Vercel
- More customization options

**📖 See `QUICK_START.md` for step-by-step instructions!**

## 🧪 Testing

### Local Testing (Serverless Function):

```bash
npm install
npm run dev
# Visit http://localhost:3000/contact-us
```

### Production Testing:

1. Deploy to Vercel
2. Visit `/contact-us/`
3. Fill out and submit the form
4. Check email at: amen@serenetouchcareservices.co.uk

## 🔒 Security Features

- Input validation and sanitization
- Email format validation
- Built-in spam protection (Web3Forms includes honeypot)
- CORS handling for API routes
- Environment variables for sensitive data

## 🔧 Troubleshooting

### Emails Not Sending

**For Serverless Function:**

1. Check Vercel deployment logs: `vercel logs`
2. Verify environment variables in Vercel dashboard
3. Test API endpoint: `https://yourdomain.com/api/contact`
4. Check email service quotas/limits

**For Web3Forms:**

1. Verify Access Key is correct
2. Check Web3Forms dashboard for submissions
3. Verify email is configured in Web3Forms settings

### Form Not Submitting

1. Check browser console for errors
2. Verify JavaScript is loading
3. Check network tab for failed requests
4. Ensure form fields have correct `name` attributes

## 📊 Email Service Comparison

| Service        | Free Tier | Best For        | Setup   |
| -------------- | --------- | --------------- | ------- |
| **Web3Forms**  | 250/month | Quick setup     | Easiest |
| **SendGrid**   | 100/month | Reliability     | Medium  |
| **Resend**     | 100/month | Vercel projects | Medium  |
| **Gmail SMTP** | ~500/day  | Testing         | Easy    |

## 📚 Documentation Files

- **`QUICK_START.md`** - Start here! Quick setup guide
- **`VERCEL_SETUP_GUIDE.md`** - Detailed instructions for all options
- **`contact-form-web3forms.html`** - Ready-to-use Web3Forms form
- **`env.example`** - Environment variables template

## 🆘 Support

Need help? Check:

1. `QUICK_START.md` for immediate solutions
2. `VERCEL_SETUP_GUIDE.md` for detailed steps
3. Vercel documentation: https://vercel.com/docs
4. Web3Forms docs: https://docs.web3forms.com

chrome.runtime.onMessageExternal.addListener((message, sender, sendResponse) => {
    switch (message && message.type) {
      // Our web app sent us a "getUserScreen" request.
      case 'getUserScreen':
        handleGetUserScreenRequest(message.sources, sender.tab, sendResponse);
        break;
  
      // Our web app sent us a request we don't recognize.
      default:
        handleUnrecognizedRequest(sendResponse);
        break;
    }
  
    return true;
  });
# sentiment-analysis
Sentiment analysis of text content is important for many natural language processing tasks. Especially with the development of social media, there is a big need to dig meaningful information from the big data on Internet through sentiment analysis. The existing techniques of sentiment analysis use a predefined dataset for detection of emotions. These techniques are based on traditional classification models such as Naïve Bayes (NB), Naïve Bayes with bag of bigram features (BiNB) and support vector machines (SVM). However, these models could not reach the desired levels of accuracy due to their rule-based or corpus-based nature which restricts the accuracy of results to the size of the training data and the parameters of the model. To overcome these challenges, in our project we have applied a deep learning model - Convolutional Neural Network – to handle the task of sentiment analysis. Deep learning has an edge over the traditional machine learning algorithms, like SVM and Naïve Bayes, for sentiment analysis because of its potential to overcome the challenges faced by sentiment analysis and handle the diversities involved, without the expensive demand for manual feature engineering. In our project first, we used word2vec proposed by Google to compute vector representations of words, which is then given as input to the CNN. The purpose of using word2vec is to gain the vector representation of a word and reflect the distance of words. This will lead to a better initialization of CNN parameters and thus will efficiently improve the performance of the task at hand. This is followed by a max-pooling layer, which combines the outputs of the neuron clusters and identifies those words which play the major role in the prediction of sentiment. Thus we were able to achieve an accuracy of 0.786 using CNN. 

Functional Requirements

Functional requirements defining this project are as follows:
•	Real-Time Processing: The software will take input, process data, and display output in real-time.
•	Sentiment Analysis: Sentiment analysis will be performed on the keywords within the input text to determine the overall feedback (negative/positive) relative to the movie.
•	Output: The software must output data in the form of simple charts and histograms. This output will be clear and easy to understand.

Non-Functional Requirements

Following are the parameters we will use, to evaluate our implemented model:
•	Performance Measures: Python3 will provide prompt perform analysis of the data using the various software packages available in it. The output should display the latest results at all times, and if it lags behind, the user should be notified. The website should be capable of operating in the background should the user wish to utilize other applications.
•	Reliability: The software will meet all of the functional requirements without any unexpected behavior. At no time should the output display incorrect or outdated information without alerting the user to potential errors. In this instance error message will be shown. As the training set becomes larger, the accuracy will tend to 100%.
•	Availability: The software will be available at all times on the user’s device (desktop or laptop), as long as the device is in proper working order. The functionality of the software will depend on any external services such as internet access that are required. If those services are unavailable, the user should be alerted.
•	Security: The software should never disclose any personal information of users, and should collect no personal information from its users. 

The steps of sentiment analysis are:
STEP 1: Training the CNN model using unsupervised learning. The CNN model is trained on a training data set consisting of 10662 reviews.
STEP 2: After training is complete, the model is tested and is ready to use to predict the sentiment of previously unseen data.
STEP 3: The user feedback for a movie is collected when the user enters his/her review on the website.
STEP 4: This feedback is converted into a vector representation by using word2vec provided by Google.
STEP 5: In the next step, this vector representation is fed as input to CNN.
STEP 6: The input feedback passes through a number of CNN and pooling layers, parameters are tuned and the different words in the feedback are analyzed for sentiment. 
STEP 7: Finally, a fully connected output layer is constructed to combine the results of all layers and predict the final sentiment of the whole sentence.
STEP 8: This sentiment is then stored in the database corresponding to the movie and it is also reflected back to the user.
For the purpose of sentiment, we have used the Convolutional neural network model. We have used the word2vec to gain the vectors for the words as the input. Word2vec is a neural net that processes text before that text is handled by deep-learning algorithms. In this problem, what we wanted to classify the sentences with CNN, but CNN can’t understand the sentences directly as a human. To deal with it, word2vec translates text into the vector that CNN can understand. At the same time, the vector produced by the word2vec can represent the distance of words. When two words’ meaning is similar, the vectors’ value of them is closed too. A string of sentences is expected by word2vec as its input. Each sentence, which is each array of words, is transformed to vectors and compared to other vectors’ lists of words in an n-dimensional vector space. Related words or groups of words appear next to each other in that space. When we gain the vectors of words, it allows us to measure their similarities with some exactness and cluster them. CNN will have a better performance because of it.

After the sentence is converted into its vector representation, the vector is fed as input to the Convolutional neural network in the input layer. The CNN learns the values of its filters and uses an activation function, like ReLU or tanh, to combine the values of the filters with the sentence matrix. After that, pooling layer is applied to form uni-variate feature vectors, which are then classified into suitable classes by a softmax function at the output layer.
         

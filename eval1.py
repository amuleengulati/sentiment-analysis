#! /usr/bin/env python

import tensorflow as tf
import numpy as np
import cnn
import os
import time
import datetime
import data_helpers
from text_cnn import TextCNN
from tensorflow.contrib import learn
import csv

tf.flags.DEFINE_string("positive_data_file", "C:\\wamp\\www\\project\\cnn_project\\data\\rt-polaritydata\\"
                                             "rt-polarity.pos", "Data source for the positive data.")
tf.flags.DEFINE_string("negative_data_file", "C:\\wamp\\www\\project\\cnn_project\\data"
                                             "\\rt-polaritydata\\"
                                             "rt-polarity.neg", "Data source for the negative data.")

tf.flags.DEFINE_integer("batch_size", 64, "Batch Size (default: 64)")
tf.flags.DEFINE_string("checkpoint_dir", "C:\\wamp\\www\\project\\cnn_project\\runs\\1511273357", "")
tf.flags.DEFINE_boolean("eval_train", False, "Evaluate on all training data")

tf.flags.DEFINE_boolean("allow_soft_placement", True, "Allow device soft device placement")
tf.flags.DEFINE_boolean("log_device_placement", False, "Log placement of ops on devices")

FLAGS = tf.flags.FLAGS
FLAGS._parse_flags()

with open('test.csv', newline='') as csvfile:
    x_raw= csv.reader(csvfile, delimiter=',', quotechar='|')
    for row in x_raw:
#         print(' '.join(row))
        vocab_path = "C:\\wamp\\www\\project\\cnn_project\\runs\\1511273357\\vocab"
        vocab_processor = learn.preprocessing.VocabularyProcessor.restore(vocab_path)
        x_test = np.array(list(vocab_processor.transform(row)))
#    print(x_test)

checkpoint_file = tf.train.latest_checkpoint("C:\\wamp\\www\\project\\"
                                             "cnn_project\\runs\\1511273357\\checkpoints")
graph = tf.Graph()
with graph.as_default():
        session_conf = tf.ConfigProto(
        allow_soft_placement=FLAGS.allow_soft_placement,
        log_device_placement=FLAGS.log_device_placement)
        sess = tf.Session(config=session_conf)
        with sess.as_default():
           saver = tf.train.import_meta_graph("{}.meta".format(checkpoint_file))
           saver.restore(sess, checkpoint_file)

        input_x = graph.get_operation_by_name("input_x").outputs[0]
        input_y = graph.get_operation_by_name("input_y").outputs[0]
        dropout_keep_prob = graph.get_operation_by_name("dropout_keep_prob").outputs[0]

        predictions = graph.get_operation_by_name("output/predictions").outputs[0]

        batches = data_helpers.batch_iter(list(x_test), FLAGS.batch_size, 1, shuffle=False)

        all_predictions = []
        for x_test_batch in batches:
          batch_predictions = sess.run(predictions, {input_x: x_test_batch, dropout_keep_prob: 1.0})
          all_predictions = np.concatenate([all_predictions, batch_predictions])
results = list(map(int, all_predictions))
for num in results:
    if num == 1:
        print("Positive")
    else:
        print("Negative")
cnn.score()

